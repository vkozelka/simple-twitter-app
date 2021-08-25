FROM php:8.0-apache
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 80