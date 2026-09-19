#!/bin/sh

set -e

php artisan config:clear

php artisan migrate --force

php artisan db:seed --class=AdminUserSeeder --force

php-fpm -D

nginx -g "daemon off;"