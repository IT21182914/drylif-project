#!/bin/bash
set -e

echo "=== Docker Entrypoint Starting ==="
echo "Working directory: $(pwd)"
echo "User: $(whoami)"
echo "PHP version: $(php -v | head -n 1)"

# Check if we're in the right directory
if [ ! -f "artisan" ]; then
    echo "ERROR: artisan file not found. Current directory contents:"
    ls -la
    echo "Looking for Laravel files..."
    find /var/www -name "artisan" -type f 2>/dev/null || echo "No artisan file found"
    exit 1
fi

echo "Laravel project found!"

# Wait for database to be ready if DATABASE_URL is provided
if [ ! -z "$DATABASE_URL" ]; then
    echo "Configuring PostgreSQL from DATABASE_URL..."
    
    # Parse DATABASE_URL to extract components
    # Format: postgresql://username:password@host:port/database
    DB_USER=$(echo $DATABASE_URL | sed -n 's/.*:\/\/\([^:]*\):.*/\1/p')
    DB_PASS=$(echo $DATABASE_URL | sed -n 's/.*:\/\/[^:]*:\([^@]*\)@.*/\1/p')
    DB_HOST=$(echo $DATABASE_URL | sed -n 's/.*@\([^:]*\):.*/\1/p')
    DB_PORT=$(echo $DATABASE_URL | sed -n 's/.*:\([0-9]*\)\/.*/\1/p')
    DB_NAME=$(echo $DATABASE_URL | sed -n 's/.*\/\([^?]*\).*/\1/p')
    
    echo "Database config: $DB_USER@$DB_HOST:$DB_PORT/$DB_NAME"
    
    # Create .env file with database configuration
    cat > .env << EOF
APP_NAME=Ihrachane
APP_ENV=production
APP_KEY=base64:$(openssl rand -base64 32)
APP_DEBUG=false
APP_TIMEZONE=UTC
APP_URL=https://ihrachane-app.onrender.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=pgsql
DB_HOST=$DB_HOST
DB_PORT=$DB_PORT
DB_DATABASE=$DB_NAME
DB_USERNAME=$DB_USER
DB_PASSWORD=$DB_PASS

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="\${APP_NAME}"

VITE_APP_NAME="\${APP_NAME}"
EOF

    echo "Environment file created successfully"
else
    echo "WARNING: DATABASE_URL not found in environment"
    exit 1
fi

# Set proper permissions
echo "Setting permissions..."
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html

# Test database connection
echo "Testing database connection..."
php artisan tinker --execute="DB::connection()->getPdo(); echo 'Database connection successful!'"

# Generate application key if not set
echo "Generating application key..."
php artisan key:generate --force --no-interaction

# Clear and cache configuration
echo "Optimizing Laravel..."
php artisan config:clear
php artisan config:cache || echo "Config cache failed - continuing..."
php artisan route:clear
php artisan route:cache || echo "Route cache failed - continuing..."
php artisan view:clear
php artisan view:cache || echo "View cache failed - continuing..."

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force --no-interaction

echo "=== Laravel setup completed! ==="
echo "Starting Apache web server..."

# Start Apache in foreground
exec apache2-foreground
