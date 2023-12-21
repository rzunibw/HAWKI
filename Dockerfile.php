FROM php:8.2-fpm-alpine
COPY . /var/www/html/public

RUN apk add --no-cache git libzip-dev zip \
    && docker-php-ext-install zip \
    && cd /var/www/html/public \
    && chmod +x composer_install.sh && ./composer_install.sh \ 
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-cache \
    && rm composer_install.sh Dockerfile.caddy Dockerfile.php 
