FROM alpine:3.21 AS base

RUN set -x \
    && apk add --no-cache \
        ca-certificates \
        curl \
        shadow \
        tzdata \
        php83 \
        php83-ctype \
        php83-curl \
        php83-embed \
        php83-fileinfo \
        php83-iconv \
        php83-intl \
        php83-mbstring \
        php83-opcache \
        php83-openssl \
        php83-pecl-xdebug \
    	php83-pdo_pgsql \
        php83-phar \
        php83-posix \
        php83-session \
        php83-simplexml \
        php83-soap \
        php83-sockets \
        php83-sodium \
        php83-tokenizer \
        php83-xml \
        php83-xmlreader \
        php83-xmlwriter \
        php83-zip \
    && ln -sf /usr/lib/libphp83.so /usr/lib/libphp.so \
    && ln -sf /usr/bin/php83 /usr/bin/php \
;

RUN set -x \
    && useradd -g www-data -N www-data \
    && apk del shadow \
;

USER www-data

COPY --chown=www-data:www-data . /app
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app
RUN set -x \
    && composer install --no-scripts --prefer-dist --no-progress --no-interaction \
;

FROM base AS application

COPY --from=ghcr.io/roadrunner-server/roadrunner:2024.3.5 /usr/bin/rr /usr/local/bin/rr
COPY --from=base /usr/local/bin/composer /usr/local/bin/composer
COPY --from=base /app /app
# CMD ["ping" 'https://www.divan.ru/']

# CMD ["rr", "serve", "-c", "/app/.rr.yaml"]


