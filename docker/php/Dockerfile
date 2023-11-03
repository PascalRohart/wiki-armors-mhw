FROM composer:2.2 as composer
FROM php:8.1.0-fpm

RUN apt-get update && \
    apt-get install -y curl zip unzip && \
    apt-get clean

RUN apt-get update;

RUN docker-php-ext-install pdo_mysql

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY docker/php/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

USER www-data

WORKDIR /usr/src/app/

ENTRYPOINT ["/entrypoint.sh"]