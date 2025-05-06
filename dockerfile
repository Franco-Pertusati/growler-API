# Usa PHP con Apache
FROM php:8.2-apache

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    git unzip libicu-dev libzip-dev zip libonig-dev libxml2-dev \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Habilita mod_rewrite para Symfony
RUN a2enmod rewrite

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia el proyecto
COPY . /var/www/html

# Establece directorio de trabajo
WORKDIR /var/www/html

# Asigna permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Instala dependencias
RUN composer install --no-dev --optimize-autoloader

# Ejecuta migraciones al iniciar
CMD php bin/console doctrine:migrations:migrate --no-interaction && apache2-foreground

# Exponer puerto Apache
EXPOSE 80
