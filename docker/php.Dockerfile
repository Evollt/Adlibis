FROM php:8.4-fpm-alpine

WORKDIR /var/www/app

COPY php.ini /usr/local/etc/php/php.ini

# Установка необходимых библиотек и GD
RUN apk add --no-cache \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    libwebp-dev \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

