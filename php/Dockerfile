FROM php:8.3-fpm-alpine

# Dependencias del sistema (zip, intl, etc.) + herramientas
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    icu-dev \
    oniguruma-dev \
    libzip-dev \
    mysql-client \
  && docker-php-ext-configure intl \
  && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_mysql \
    mbstring \
    intl \
    zip \
  && rm -rf /var/cache/apk/*

# Composer (copiado desde la imagen oficial)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# ... (lo anterior se queda igual)

# Crear todas las carpetas necesarias (storage y bootstrap/cache)
RUN mkdir -p /var/www/storage/framework/views \
    && mkdir -p /var/www/storage/framework/cache \
    && mkdir -p /var/www/storage/framework/sessions \
    && mkdir -p /var/www/storage/app/public/avatares \
    && mkdir -p /var/www/bootstrap/cache

# Ahora sí, asignar propiedad y permisos sin que falle
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache