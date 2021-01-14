FROM php:7.4-fpm-alpine

RUN curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/5.3.1.tar.gz \
    && tar xfz /tmp/redis.tar.gz \
    && rm -r /tmp/redis.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && mv phpredis-* /usr/src/php/ext/redis

RUN apk add --update --no-cache gmp gmp-dev tzdata \
    && docker-php-ext-install gmp \
    && docker-php-ext-install redis pdo_mysql opcache \
    && cp /usr/share/zoneinfo/America/Argentina/Buenos_Aires /etc/localtime \
    && echo "America/Argentina/Buenos_Aires" >  /etc/timezone \
    && echo "* * * * * /usr/local/bin/php /var/www/html/artisan schedule:run >> /dev/null 2>&1" | crontab -

WORKDIR /var/www/html

COPY --chown=www-data:www-data src .
COPY build/php/php-fpm.d/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY build/php/conf.d/opcache.ini /usr/local/etc/php/conf.d/
COPY build/php/php.ini "$PHP_INI_DIR/php.ini"

RUN php artisan config:cache
RUN php artisan view:cache
#RUN php artisan route:cache //TODO descomentar cuando no se usen mas closures en web.php