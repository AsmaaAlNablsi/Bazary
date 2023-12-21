FROM tatweer:php82

WORKDIR /var/www

# Install Node 16, npm
#RUN apt-get update
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get install -y nodejs npm

# Copy project code with correct permissions
COPY --chown=www-data:www-data . .

# Copy nginx/php/supervisor configs
RUN cp .docker/run.sh ./docker/run.sh

# Deployment steps
RUN chown -R www-data:www-data /var/www
RUN composer install --optimize-autoloader --no-dev
RUN chmod +x /var/www/docker/run.sh

# npm packages install
RUN npm install
RUN npm run build
#RUN php artisan migrate --seed --no-interaction 
#RUN php artisan key:generate --show
RUN php artisan storage:link

RUN chown -R www-data:www-data /var/www
RUN chown -R www-data:www-data /var/www/storage/
RUN chmod 775 -R /var/www/storage/

EXPOSE 80
ENTRYPOINT ["/var/www/docker/run.sh"]