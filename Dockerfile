FROM php:8.2.12-apache

WORKDIR /var/www

RUN apt-get update -y && apt-get install -y \
    zip unzip \
    git curl \ 
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring exif \
    pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho

# Copiar os ficheiros do projeto
COPY . .

RUN  docker-php-ext-install gettext intl pdo_mysql gd
# Define permissões
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

