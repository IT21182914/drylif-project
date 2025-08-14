FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    nodejs \
    npm

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

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
RUN npm ci && npm run build

# Set proper permissions for Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www \
    && chmod -R 775 /var/www/storage \
    && chmod -R 775 /var/www/bootstrap/cache

# Create basic .env file (will be overwritten by entrypoint)
RUN echo "APP_NAME=ihrachane" > /var/www/.env \
    && echo "APP_ENV=production" >> /var/www/.env \
    && echo "APP_DEBUG=false" >> /var/www/.env \
    && echo "APP_KEY=base64:Edr0vS4NJ8ZsNdqGhrwCsZBe/eJBT/+ZMovLBMO0PEk=" >> /var/www/.env

# Make entrypoint script executable
RUN chmod +x /var/www/docker-entrypoint.sh

# Change current user to www-data
USER www-data

# Expose port 80
EXPOSE 80

# Use custom entrypoint script
CMD ["/var/www/docker-entrypoint.sh"]
