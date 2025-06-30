FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN chown -R www-data:www-data /var/www/html/
RUN chmod -R 755 /var/www/html/

USER www-data

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html