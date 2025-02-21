# Используем PHP 7.4 с FPM
FROM php:7.4-fpm

# Установка зависимостей и расширений
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    libpq-dev \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    libxpm-dev \
    pkg-config \
    postgresql postgresql-contrib \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm \
    && docker-php-ext-install gd zip pdo pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Определение рабочей директории
WORKDIR /app

# Копирование файлов проекта в контейнер
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-dev --optimize-autoloader

# Настройка PostgreSQL
RUN service postgresql start && \
    su - postgres -c "psql -tc \"SELECT 1 FROM pg_roles WHERE rolname='postgres'\" | grep -q 1 || psql -c \"ALTER USER postgres WITH PASSWORD '12345';\"" && \
    su - postgres -c "psql -tc \"SELECT 1 FROM pg_database WHERE datname='reestr'\" | grep -q 1 || psql -c \"CREATE DATABASE reestr OWNER postgres;\""

# Открываем порт
EXPOSE 8000

# Запуск PostgreSQL и Laravel при старте контейнера
CMD service postgresql start && php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000
