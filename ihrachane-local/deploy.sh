#!/bin/bash

echo "🚀 Starting deployment process..."

# Clear configuration cache
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations
php artisan migrate --force

# Cache configuration for better performance
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Create storage link if it doesn't exist
php artisan storage:link

echo "✅ Deployment completed successfully!"
