FROM php:5.6-fpm

ARG DEBIAN_FRONTEND=noninteractive

RUN \
  apt-get update && apt-get install -y --no-install-recommends apt-utils

RUN \
  apt-get update && apt-get install -y --no-install-recommends nano git curl  wget nano libpng-dev libmcrypt-dev libreadline-dev libxml2-dev

RUN \
  docker-php-ext-install pdo pdo_mysql mbstring zip gd soap mcrypt 

RUN  \
    pecl install xdebug-2.5.5 && \
    docker-php-ext-enable xdebug

RUN  \
  echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
  echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
  echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
  echo "xdebug.remote_start=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
  echo "xdebug.default_enable=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
  echo "xdebug.idekey=\"vscode\"" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
  echo "xdebug.remote_connect_back=on" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini


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

# ADD ./app/vs7 /app/magento-mirror/app/code/local/vs7
# ADD ./app/vs7_articles.xml /app/magento-mirror/app/etc/modules/vs7_articles.xml

# ADD ./app/Tester /app/magento-mirror/app/code/local/Tester
# ADD ./app/Tester_Test.xml /app/magento-mirror/app/etc/modules/Tester_Test.xml


# --------------------------

# RUN \
#   git clone https://github.com/sr9yar/docker-test.git  && \
#   ls -lah docker-test


VOLUME  /app

EXPOSE 9000

