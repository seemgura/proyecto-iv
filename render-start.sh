#!/usr/bin/env bash

echo "Installing PHP dependencies..."
composer install --no-dev --optimize-autoloader --working-dir=/var/www/html

echo "Caching configuration..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force