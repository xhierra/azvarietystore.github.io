FROM php:7.4.20-apache

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
     libzip-dev \
    zip \
    unzip
# 
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd
RUN docker-php-ext-install zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set up node and npm

# RUN curl -sL https://deb.nodesource.com/setup_18.x | bash
# RUN apt-get update && apt-get -y install nodejs 

# Set working directory
WORKDIR /var/www

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

WORKDIR /var/www/html
COPY . .

#Modify php.ini setings

RUN touch /usr/local/etc/php/conf.d/uploads.ini \
    && echo "upload_max_filesize = 20M;" >> /usr/local/etc/php/conf.d/uploads.ini

#Serve the application

RUN composer install
CMD php artisan migrate --force && php artisan optimize && php artisan cache:clear && php artisan config:clear && php artisan serve --host=0.0.0.0 --port=$PORT
