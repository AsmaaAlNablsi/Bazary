#!/bin/sh

cd /var/www
#composer dump-autoload -o \
# && chmod -R 775 /var/www/app/storage /var/www/app/bootstrap/cache
#php artisan config:clear
#php artisan route:clear
#php artisan view:clear
#php artisan cache:clear
php artisan migrate

/usr/bin/supervisord -c /etc/supervisord.conf