FROM composer:2.1.12 as build
WORKDIR /var/www/lumen
COPY ./lumen /var/www/lumen
RUN composer install
RUN chmod 777 storage/logs/

FROM php:7.3-apache
EXPOSE 8000
COPY --from=build /var/www/lumen /var/www/lumen
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
RUN chown -R www-data:www-data /var/www/lumen
RUN a2enmod rewrite