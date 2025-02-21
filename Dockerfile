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

# Открываем порт (не обязательно для Render, но полезно)
EXPOSE 8000

# Команда для запуска приложения на Render.com
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
