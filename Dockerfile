FROM php:7.4-apache

RUN apt-get update

RUN apt-get install zlib1g-dev
RUN apt-get install libicu-dev
RUN apt-get install g++
RUN apt-get install libzip-dev
RUN apt-get install unzip

RUN docker-php-ext-install zip
RUN docker-php-ext-install intl
RUN docker-php-ext-install exif

RUN docker-php-ext-configure intl

RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer