FROM php:5.6-fpm

ARG DEBIAN_FRONTEND=noninteractive

RUN \
  apt-get update && apt-get install -y --no-install-recommends apt-utils

RUN \
  apt-get update && apt-get install -y --no-install-recommends nano git curl  wget nano libpng-dev libmcrypt-dev libreadline-dev libxml2-dev

RUN \
  docker-php-ext-install pdo pdo_mysql mbstring zip gd soap mcrypt

ADD ./app /app
WORKDIR /app

RUN \
  curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN \
  curl -O https://files.magerun.net/n98-magerun.phar && \
  chmod +x ./n98-magerun.phar && \
  cp ./n98-magerun.phar /usr/local/bin/ 

RUN \
  git clone https://github.com/OpenMage/magento-mirror.git && \
  ls -lah magento-mirror

COPY ./app/install.sh ./magento-mirror/install.sh
RUN chmod 755 ./magento-mirror/install.sh

RUN chown -R www-data:www-data .

WORKDIR /app/magento-mirror


# --------------------------

# RUN \
#   git clone https://github.com/sr9yar/docker-test.git  && \
#   ls -lah docker-test


VOLUME  /app

EXPOSE 9000

