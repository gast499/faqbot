FROM php:7-fpm-alpine

RUN apk update && apk --no-cache add \
        postgresql-dev

RUN docker-php-ext-install pdo_pgsql

EXPOSE 9000
CMD ["php-fpm"]