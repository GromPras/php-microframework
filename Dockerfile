FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev && \
    docker-php-ext-install zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# ---- Install Node.js (LTS version) and npm ----
# Add NodeSource APT repository and install Node.js (e.g., v18 LTS)
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Change the Apache DocumentRoot to /var/www/html/public
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/www|' /etc/apache2/sites-available/000-default.conf

# Optionally ensure your public dir exists
RUN mkdir -p /var/www/html/www
