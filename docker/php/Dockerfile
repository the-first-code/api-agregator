FROM php:8.3-fpm

# Установка зависимостей
#RUN apk add --no-cache \
#    postgresql-dev \
#    libzip-dev \
#    zip \
#    unzip \
#    autoconf \
#    g++ \
#    make \
#    && docker-php-ext-install pdo pdo_pgsql zip \
#    && pecl install redis \
#    && docker-php-ext-enable redis \
#    && apk del autoconf g++ make



# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libpng-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring zip exif pcntl
# RUN docker-php-ext-configure gd --with-gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/
RUN docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg
RUN docker-php-ext-install gd



# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Настройка прав доступа
RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html
