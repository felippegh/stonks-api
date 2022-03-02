FROM php:8.0-fpm-alpine

#Install postgres dependencies
RUN set -ex && apk --no-cache add postgresql-dev

#Install application dependencies
RUN apk add --no-cache libzip-dev zip
RUN docker-php-ext-install mysqli pdo_pgsql exif zip

RUN apk add --update --no-cache autoconf g++ make && pecl install redis && docker-php-ext-enable redis

RUN apk --no-cache add bash openrc curl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

ENV COMPOSER_MEMORY_LIMIT=-1

RUN apk add --update nodejs npm

RUN npm install -g yarn

# Create dev user
USER root
RUN addgroup -S dev &&\
    adduser -u 1000 -G dev -S dev

# Switch to use a non-root user from here on
USER dev

# Setup document root
RUN mkdir -p /var/www/html/laravel-challenge

# Set root dir
WORKDIR /var/www/html/laravel-challenge
