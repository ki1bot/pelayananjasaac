FROM php:8.4-cli-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libicu-dev \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    bcmath \
    zip \
    intl \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

ARG UID=1000
ARG GID=1000

RUN groupadd -g ${GID} laravel \
    && useradd -m -u ${UID} -g ${GID} laravel

WORKDIR /var/www

USER laravel

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
