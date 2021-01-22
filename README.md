#Capacitacion

**Pasos para levantar el proyecto localmente**

**Correr** 

`docker-compose run --rm composer install`

`docker-compose run --rm npm install`

`docker-compose up -d`

`docker-compose exec php php artisan migrate --seed`

Si quieren borrar todas las tablas de la base y volver a crearlas y seedearlas

`docker-compose exec php php artisan migrate:refresh --seed`
