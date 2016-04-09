FROM fesor/php-fpm

COPY . /srv/

WORKDIR /srv
CMD ["bash", "boot.sh"]
