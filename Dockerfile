FROM php:8.0-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    gnupg \
    unixodbc \
    unixodbc-dev

# Install SQL Server drivers
RUN pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# Enable Apache rewrite
RUN a2enmod rewrite

# Copy project
COPY . /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html
