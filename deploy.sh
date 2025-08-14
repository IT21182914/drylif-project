#!/bin/bash

echo "🚀 Starting Render deployment process..."

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node.js dependencies and build assets
npm ci
npm run build

# Clear configuration cache
php artisan config:clear
php artisan route:clear
php artisan view:clear

echo "✅ Build completed successfully!"
