FROM php:7.2-fpm-alpine

ENV EXECUTE_USER developer
RUN apk update && apk add libmcrypt-dev mysql-client zip unzip vim shadow
RUN docker-php-ext-install pdo_mysql mysqli mbstring
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    # user追加
    useradd -m -s /bin/bash -u 1000 ${EXECUTE_USER} && \
    # www.conf修正
    sed -i "s/user\ \=\ www-data/user\ \=\ ${EXECUTE_USER}/g" /usr/local/etc/php-fpm.d/www.conf && \
    sed -i "s/group\ \=\ www-data/group\ \=\ ${EXECUTE_USER}/g" /usr/local/etc/php-fpm.d/www.conf
WORKDIR /var/www/app
