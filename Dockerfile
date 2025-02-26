FROM php:7.4-cli

RUN apt-get update && apt-get install -y \
    curl git zip && \
    docker-php-ext-install pdo pdo_mysql mysqli && \
    rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
COPY . .
RUN composer install

EXPOSE 8000




