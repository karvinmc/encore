FROM php:8.3-fpm-alpine
RUN docker-php-ext-install pdo pdo_mysql

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /code

# copy file project laravel
COPY . /code

RUN composer install