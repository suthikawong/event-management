FROM php:apache
RUN a2enmod rewrite
# RUN docker-php-ext-install mysqli
EXPOSE 80