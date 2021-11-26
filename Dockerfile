FROM composer:2.1.12 as build
WORKDIR /lumen
COPY ./lumen /lumen
RUN composer install
RUN chmod 777 storage/logs/*.log

FROM php:7.3-apache
EXPOSE 8000
COPY --from=build /lumen /lumen
COPY vhost.conf /etc/apache2/sites-available/000-default.conf
# RUN chown -R www-data:www-data /lumen a2enmod rewrite