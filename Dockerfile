FROM php:7.4-apache
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libicu-dev \
    g++ \
    libzip-dev \
    unzip

RUN pecl install xdebug
RUN docker-php-ext-install zip intl exif pdo_mysql
RUN docker-php-ext-enable pdo_mysql xdebug
RUN docker-php-ext-configure intl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer