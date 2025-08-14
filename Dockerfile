FROM php:8.2-apache

# Install system dependencies including Node.js 18.x
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    wget

# Install Node.js 18.x
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure Apache
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf
RUN a2enmod rewrite
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/public\n\
    <Directory /var/www/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www

# Copy package.json and package-lock.json first for better caching
COPY package*.json ./

# Install Node dependencies (including dev dependencies for building)
RUN npm ci

# Copy the rest of the application
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Build assets
RUN npm run build

# Remove dev dependencies to reduce image size
RUN npm prune --production

# Set proper permissions for Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Create production .env file
RUN cp /var/www/.env.example /var/www/.env \
    && sed -i 's/APP_ENV=local/APP_ENV=production/' /var/www/.env \
    && sed -i 's/APP_DEBUG=true/APP_DEBUG=false/' /var/www/.env \
    && sed -i 's/LOG_LEVEL=debug/LOG_LEVEL=error/' /var/www/.env

# Generate application key
RUN php artisan key:generate --force

# Make entrypoint script executable
RUN chmod +x /var/www/docker-entrypoint.sh

# Expose port 80
EXPOSE 80

# Use custom entrypoint script (run as root for proper permissions)
CMD ["/var/www/docker-entrypoint.sh"]
