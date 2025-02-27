<<<<<<< HEAD
FROM php:8.3-fpm

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html

CMD ["php-fpm"]
=======
FROM php:8.3-fpm

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html

CMD ["php-fpm"]
>>>>>>> 8b12d6167a3c4876b2bbe8f4054148d21c81626c
