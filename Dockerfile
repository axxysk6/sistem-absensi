FROM php:8.3-fpm

WORKDIR /app

# Install dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip libzip-dev \
    libpng-dev libonig-dev libxml2-dev

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Install Node.js (VERSI BENAR)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Copy project
COPY . .

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Frontend build
RUN npm install
RUN npm run build

# CLEAR CACHE (INI YANG SERING KELUPA)
RUN php artisan optimize:clear
RUN php artisan view:clear
RUN php artisan config:clear

# CACHE ULANG UNTUK PRODUCTION
RUN php artisan config:cache
RUN php artisan view:cache
RUN php artisan route:cache

# Laravel cache
RUN php artisan config:cache
RUN php artisan route:cache

# Permission fix
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD php artisan serve --host=0.0.0.0 --port=8080