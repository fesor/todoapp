FROM php:7.0-fpm

RUN apt-get update && \
    apt-get install -y libmcrypt-dev libpq-dev netcat

RUN docker-php-ext-install \
        mcrypt \
        bcmath \
        mbstring \
        zip \
        opcache \
        pdo pdo_pgsql

RUN yes | pecl install apcu xdebug-beta \
        && echo "extension=$(find /usr/local/lib/php/extensions/ -name apcu.so)" > /usr/local/etc/php/conf.d/apcu.ini \
        && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
        && echo "xdebug.remote_connect_back=on" >> /usr/local/etc/php/conf.d/xdebug.ini

COPY . /srv/

WORKDIR /srv
CMD ["bash", "boot.sh"]
