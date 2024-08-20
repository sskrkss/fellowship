FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends curl git unzip libxml2-dev libpq-dev libzip-dev libpng-dev libjpeg-dev libwebp-dev libfreetype6-dev && \
    pecl install apcu && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install -j$(nproc) zip opcache intl pdo_pgsql pgsql gd && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
#Install xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = 1024M' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini

WORKDIR /var/www

EXPOSE 9000
