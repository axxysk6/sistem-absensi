FROM php:8.3-fpm

WORKDIR /app

# =========================================
# SYSTEM DEPENDENCIES
# =========================================
RUN apt-get update && apt-get install -y \
    git curl unzip zip \
    libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# =========================================
# INSTALL NODE.JS (WAJIB NODE 22 UNTUK VITE 8)
# =========================================
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# =========================================
# INSTALL COMPOSER
# =========================================
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

# =========================================
# COPY PROJECT
# =========================================
COPY . .

# =========================================
# INSTALL BACKEND DEPENDENCIES
# =========================================
RUN composer install --no-dev --optimize-autoloader

# =========================================
# INSTALL FRONTEND + BUILD VITE
# =========================================
RUN npm install
RUN npm run build

# =========================================
# LARAVEL CACHE OPTIMIZATION
# =========================================
# Laravel cache (SAFE VERSION)
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# =========================================
# STORAGE PERMISSION FIX
# =========================================
RUN chmod -R 775 storage bootstrap/cache

# =========================================
# PORT RAILWAY
# =========================================
EXPOSE 8080

# =========================================
# START SERVER
# =========================================
CMD php artisan serve --host=0.0.0.0 --port=8080