FROM php:8.5-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install \
    --no-dev \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

COPY nginx.conf /etc/nginx/conf.d/default.conf

COPY render-start.sh /usr/local/bin/render-start
RUN chmod +x /usr/local/bin/render-start

EXPOSE 10000

CMD ["/usr/local/bin/render-start"]