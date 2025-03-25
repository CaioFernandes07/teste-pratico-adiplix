#!/bin/bash
set -e

# Verificar se estamos no diretório da aplicação
cd /app

# Verificar se existem arquivos de configuração do Composer e executar se necessário
if [ -f "composer.json" ]; then
    echo "Instalando dependências do Composer..."
    composer install --no-interaction --prefer-dist --optimize-autoloader
fi

# Verificar se existem arquivos de configuração do npm e executar se necessário
if [ -f "package.json" ]; then
    echo "Instalando dependências do npm..."
    npm install

    # Verificar se existe um script de build no package.json
    if grep -q '"build"' package.json; then
        echo "Executando npm run build..."
        npm run build
    fi
fi
# Gerar a chave da aplicação
php artisan key:generate

# Executando migrations e seeders
php artisan migrate --seed

# Adicionar permissões de escrita para o diretório de storage
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache

# Executar o comando fornecido (normalmente php-fpm)
exec "$@"
