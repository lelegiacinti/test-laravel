#!/bin/bash

php artisan make:database test-alten
php artisan migrate
php artisan serve --host=0.0.0.0
