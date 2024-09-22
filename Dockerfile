FROM bitnami/laravel:7.0.0-debian-10-r7

WORKDIR /app
COPY . .
EXPOSE 8000

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install
# RUN composer install --no-dev --optimize-autoloader
# RUN composer update

# TODO
# Esto se hace luego de montar en contenedor en el docker-compose
# RUN php artisan migrate:refresh --seed
# RUN php artisan l5-swagger:generate
# RUN php artisan passport:client --password
# RUN php artisan passport:client --personal
# copy: ./.env:/.env


CMD php artisan serve --host=0.0.0.0 --port=8000

# CMD php artisan serve --host=0.0.0.0 --port=8000
# CMD ["php" "--version"]
# CMD ["php" "artisan" "serve" "--host=0.0.0.0" "--port=8000"]