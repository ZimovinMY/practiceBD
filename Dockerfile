# PHP 7.4 CLI
FROM php:7.4-cli

# Установка зависимостей и расширений
RUN apt-get update && apt-get install -y libzip-dev libpq-dev
RUN docker-php-ext-install zip pdo pdo_pgsql gd libpng

# Установка Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

# Определение рабочей директории
WORKDIR /app

# Копирование файлов проекта в контейнер
COPY . .

# Устанавка зависимостей проекта
RUN composer install --no-dev --optimize-autoloader

# Запуск команды для старта проекта
CMD ["bash", "-c", "make start"]
