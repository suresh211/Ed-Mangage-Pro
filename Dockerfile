FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl zip \
    && docker-php-ext-install pdo pdo_mysql zip

RUN a2enmod rewrite

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 10000

CMD sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf && apache2-foreground