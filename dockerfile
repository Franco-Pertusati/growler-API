# Imagen base con PHP, Apache y extensiones necesarias
FROM php:8.2-apache

# Instala extensiones requeridas por Symfony
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libpq-dev libzip-dev zip \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Habilita mod_rewrite para Symfony
RUN a2enmod rewrite

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia el código fuente
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Asegura permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Instala dependencias Symfony
RUN composer install --no-dev --optimize-autoloader

# Expone el puerto usado por Apache
EXPOSE 80
