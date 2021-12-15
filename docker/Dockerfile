FROM webdevops/php-nginx:7.4 AS app_image

ENV WEB_DOCUMENT_ROOT=/app/public
ENV WEB_DOCUMENT_INDEX=index.php
ENV COMPOSER_VERSION=2

USER 1000

RUN mkdir -p /app
WORKDIR /app

COPY --chown=1000:1000 . .
RUN composer install --no-interaction
