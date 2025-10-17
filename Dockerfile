# Use official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install system dependencies and PostgreSQL libraries
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

# Install PHP extensions (PostgreSQL instead of MySQL)
RUN docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node dependencies and build assets
RUN npm ci && npm run build

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache to serve from public directory
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf
RUN a2enmod rewrite

# Update Apache to allow .htaccess overrides
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Expose port (Render will map this automatically)
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=40s \
    CMD curl -f http://localhost/ || exit 1

# Create startup script
RUN echo '#!/bin/bash\n\
set -e\n\
echo "=== Laravel Startup Script ==="\n\
echo "Working directory: $(pwd)"\n\
echo "Checking environment..."\n\
ls -la /var/www/html/public/\n\
echo "Running Laravel optimizations..."\n\
php artisan config:clear || true\n\
php artisan route:clear || true\n\
php artisan view:clear || true\n\
php artisan config:cache || true\n\
php artisan route:cache || true\n\
echo "=== Starting Apache ==="\n\
apache2-foreground' > /start.sh && chmod +x /start.sh

# Start script
CMD ["/start.sh"]
