# IMAGE ARGUMENT
ARG ALPINE_VERSION

# ALPINE 3.x.
FROM alpine:$ALPINE_VERSION

LABEL maintainer=jeff.venceslau@gmail.com

ARG ALPINE_VERSION
ARG PHP_VERSION
ARG DOCKERPORT
ARG feAPPNAME

RUN apk add --update-cache \
  alpine-sdk \
  sudo \
  bash \
  nano \
  curl \
  make \
  ca-certificates \
  openssh-client 


ADD https://dl.bintray.com/php-alpine/key/php-alpine.rsa.pub /etc/apk/keys/php-alpine.rsa.pub

RUN apk --update-cache add ca-certificates

RUN echo "http://dl-cdn.alpinelinux.org/alpine/v${ALPINE_VERSION}/main" > /etc/apk/repositories && \
  echo "http://dl-cdn.alpinelinux.org/alpine/v${ALPINE_VERSION}/community" >> /etc/apk/repositories && \
  echo "https://dl.bintray.com/php-alpine/v${ALPINE_VERSION}/php-${PHP_VERSION}" >> /etc/apk/repositories


RUN apk add --update-cache \
  php \
  php-common \
  php-fpm \
  php-cgi \
  php-gd \
  php-gmp \
  php-opcache \
  php-zip \
  php-memcached \ 
  php-redis \ 
  php-xdebug \
  php-bcmath \
  php-json \ 
  php-mbstring \
  php-openssl \
  php-pdo \
  php-dom \
  php-pdo_pgsql \
  php-xml \
  php-phar \
  php-zlib \ 
  php-pcntl

# install and remove building packages
ENV PHPIZE_DEPS autoconf file g++ gcc libc-dev make pkgconf re2c php-dev php-pear \
  yaml-dev libevent-dev openssl-dev

ENV PHP_INI_DIR /etc/php7

RUN ln -s /usr/bin/php7 /usr/bin/php

RUN set -xe \
  && apk add --no-cache --repository "http://dl-cdn.alpinelinux.org/alpine/edge/testing" \
  --virtual .phpize-deps \
  $PHPIZE_DEPS \ 
  # Install composer
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer \
  && chmod 755 /bin/composer

RUN rm -rf /var/lib/apt/lists/* \
  && rm -rf /tmp/pear/ \
  && rm -rf /usr/share/php7 \
  && rm -rf /tmp/* \
  && apk del .phpize-deps

RUN mkdir -pv --mode=777 /var/www/html/$APPNAME

WORKDIR /var/www/html/$APPNAME

ENV PATH=/root/.composer/vendor/bin:${PATH}

EXPOSE $DOCKERPORT

# START WITH BASH.
CMD ["/bin/bash"] 