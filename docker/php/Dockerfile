FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    zip unzip curl libzip-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libcurl4-openssl-dev default-mysql-client\
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath curl

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
