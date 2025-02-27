FROM php:8.0-fpm

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html

CMD ["php-fpm"]
