#!/bin/bash

composer install
php artisan migrate
php artisan serve --host=0.0.0.0
