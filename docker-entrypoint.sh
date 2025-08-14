#!/bin/bash
set -e

echo "=== Starting Laravel Application Setup ==="

# Parse DATABASE_URL environment variable
if [ ! -z "$DATABASE_URL" ]; then
    echo "Configuring PostgreSQL from DATABASE_URL..."
    
    # Extract components from DATABASE_URL
    # Format: postgresql://user:pass@host:port/database
    DB_USER=$(echo $DATABASE_URL | sed 's/.*:\/\/\([^:]*\):.*/\1/')
    DB_PASS=$(echo $DATABASE_URL | sed 's/.*:\/\/[^:]*:\([^@]*\)@.*/\1/')
    DB_HOST=$(echo $DATABASE_URL | sed 's/.*@\([^:]*\):.*/\1/')
    DB_PORT=$(echo $DATABASE_URL | sed 's/.*:\([0-9]*\)\/.*/\1/')
    DB_NAME=$(echo $DATABASE_URL | sed 's/.*\/\(.*\)/\1/')
    
    echo "Database configured: $DB_HOST:$DB_PORT/$DB_NAME"
else
    echo "WARNING: DATABASE_URL not found!"
fi

# Create .env file with proper configuration
echo "Creating production .env file..."
cat > /var/www/.env << EOF
APP_NAME="Ihrachane"
APP_ENV=production
APP_KEY=${APP_KEY:-}
APP_DEBUG=false
APP_TIMEZONE=UTC
APP_URL=${APP_URL:-https://ihrachane-app.onrender.com}

LOG_CHANNEL=stderr
LOG_LEVEL=error

DB_CONNECTION=pgsql
DB_HOST=${DB_HOST:-localhost}
DB_PORT=${DB_PORT:-5432}
DB_DATABASE=${DB_NAME:-ihrachane}
DB_USERNAME=${DB_USER:-postgres}
DB_PASSWORD=${DB_PASS:-}

BROADCAST_CONNECTION=log
CACHE_STORE=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
SESSION_DRIVER=database
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

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
EOF

echo "Environment file created successfully"

# Generate application key if not exists
if [ -z "$APP_KEY" ]; then
    echo "Generating application key..."
    php artisan key:generate --force --no-interaction
    # Update APP_KEY in environment for this session
    export APP_KEY=$(php artisan tinker --execute="echo config('app.key');")
fi

# Wait for database to be ready
echo "Waiting for database connection..."
for i in {1..30}; do
    if php artisan migrate:status > /dev/null 2>&1; then
        echo "Database connection successful!"
        break
    elif [ $i -eq 30 ]; then
        echo "ERROR: Could not connect to database after 30 attempts"
        echo "Attempting to continue with cached configuration..."
        break
    else
        echo "Waiting for database... (attempt $i/30)"
        sleep 2
    fi
done

# Clear all caches
echo "Clearing Laravel caches..."
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Run database migrations
echo "Running database migrations..."
if php artisan migrate --force --no-interaction; then
    echo "Migrations completed successfully"
else
    echo "WARNING: Migration failed, but continuing..."
fi

# Seed database if needed (optional)
# php artisan db:seed --force --no-interaction

# Cache configuration for production performance
echo "Caching Laravel configurations..."
if php artisan config:cache; then
    echo "Config cache successful"
else
    echo "WARNING: Config cache failed"
fi

if php artisan route:cache; then
    echo "Route cache successful"  
else
    echo "WARNING: Route cache failed"
fi

if php artisan view:cache; then
    echo "View cache successful"
else
    echo "WARNING: View cache failed"
fi

# Set proper permissions
echo "Setting proper permissions..."
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

echo "=== Laravel setup completed successfully! ==="

# Start Apache in foreground
echo "Starting Apache web server..."
exec apache2-foreground
