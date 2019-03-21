#!/bin/bash
DIR=/var/www/html

cd ${DIR} && composer install
cd ${DIR} && php artisan migrate
cd ${DIR} && php artisan db:seed
