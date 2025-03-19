FROM php:8.4-fpm

# Argumentos
ARG NODE_VERSION=22

# Variáveis de ambiente
ENV TZ=UTC
ENV DEBIAN_FRONTEND=noninteractive

WORKDIR "/app"

# Configurar timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Instalar extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl opcache

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar Node.js
RUN curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg
RUN echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list
RUN apt-get update && apt-get install -y nodejs && npm install -g npm

# Instalar dependências do Composer (otimizado para produção)
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Gerar assets
RUN npm install && npm run build

# Limpar arquivos desnecessários
RUN rm -rf node_modules

EXPOSE 9000

CMD ["php-fpm"]
