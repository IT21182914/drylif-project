#!/bin/bash
set -e

echo "=== Starting Laravel Application Setup ==="

# Parse DATABASE_URL environment variable
if [ ! -z "$DATABASE_URL" ]; then
    echo "Configuring PostgreSQL from DATABASE_URL..."
    echo "Raw DATABASE_URL: ${DATABASE_URL:0:20}..." # Show first 20 chars for debugging
    
    # Extract components from DATABASE_URL
    # Format: postgresql://user:pass@host:port/database
    # Remove the postgresql:// prefix first
    DB_URL_CLEAN=$(echo $DATABASE_URL | sed 's/postgresql:\/\///')
    
    # Now extract components
    DB_USER=$(echo $DB_URL_CLEAN | cut -d':' -f1)
    DB_PASS=$(echo $DB_URL_CLEAN | cut -d'@' -f1 | cut -d':' -f2)
    DB_HOST_PORT=$(echo $DB_URL_CLEAN | cut -d'@' -f2)
    DB_HOST=$(echo $DB_HOST_PORT | cut -d':' -f1)
    DB_PORT=$(echo $DB_HOST_PORT | cut -d'/' -f1 | cut -d':' -f2)
    DB_NAME=$(echo $DB_HOST_PORT | cut -d'/' -f2)
    
    echo "Parsed DB details:"
    echo "  User: $DB_USER"
    echo "  Host: $DB_HOST" 
    echo "  Port: $DB_PORT"
    echo "  Database: $DB_NAME"
else
    echo "WARNING: DATABASE_URL not found!"
fi

# Create .env file with proper configuration
echo "Creating production .env file..."

# Get the existing APP_KEY if it exists
EXISTING_KEY=""
if [ -f "/var/www/.env" ]; then
    EXISTING_KEY=$(grep "^APP_KEY=" /var/www/.env | cut -d'=' -f2)
fi

cat > /var/www/.env << EOF
APP_NAME="Ihrachane"
APP_ENV=production
APP_KEY=${EXISTING_KEY:-${APP_KEY:-}}
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

# Generate application key if not exists or is empty
if [ -z "$EXISTING_KEY" ] || [ "$EXISTING_KEY" = "" ]; then
    echo "Generating application key..."
    php artisan key:generate --force --no-interaction
    echo "Application key generated successfully"
else
    echo "Using existing application key"
fi

# Wait for database to be ready with better error handling
echo "Waiting for database connection..."
for i in {1..30}; do
    echo "Testing database connection (attempt $i/30)..."
    if php -r "
        try {
            \$pdo = new PDO('pgsql:host=${DB_HOST};port=${DB_PORT};dbname=${DB_NAME}', '${DB_USER}', '${DB_PASS}');
            \$pdo->query('SELECT 1');
            echo 'Database connection successful!';
            exit(0);
        } catch (Exception \$e) {
            echo 'Database connection failed: ' . \$e->getMessage();
            exit(1);
        }
    "; then
        echo "Database connection verified!"
        break
    elif [ $i -eq 30 ]; then
        echo "ERROR: Could not connect to database after 30 attempts"
        echo "Database config: Host=${DB_HOST}, Port=${DB_PORT}, DB=${DB_NAME}, User=${DB_USER}"
        echo "Attempting to continue anyway..."
        break
    else
        echo "Database not ready, waiting..."
        sleep 3
    fi
done

# Clear all caches
echo "Clearing Laravel caches..."
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Run database migrations with better error handling
echo "Running database migrations..."
if php artisan migrate --force --no-interaction 2>&1; then
    echo "Migrations completed successfully"
else
    echo "WARNING: Migration failed. Checking if tables exist..."
    if php artisan migrate:status 2>&1; then
        echo "Database tables seem to exist, continuing..."
    else
        echo "ERROR: Database migration issues detected"
        echo "Continuing anyway - app may not work properly"
    fi
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
