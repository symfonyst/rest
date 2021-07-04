FROM php:7.2-fpm
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    sendmail \
    libpng-dev \
# For gd
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libxpm-dev \
    libvpx-dev \
    zlib1g-dev
RUN pecl install xdebug-2.6.1 && docker-php-ext-enable xdebug

RUN apt -yqq update
RUN apt -yqq install libxml2-dev curl wget nano
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install xml
RUN docker-php-ext-install soap
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd

RUN mkdir -p /var/www/symfonyst/web

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
# Install phpunit
RUN wget https://phar.phpunit.de/phpunit-6.0.phar && \
        chmod +x phpunit-6.0.phar && \
        mv phpunit-6.0.phar /usr/local/bin/phpunit
WORKDIR "/var/www/symfonyst/web"
