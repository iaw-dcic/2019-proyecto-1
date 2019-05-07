# Proyecto 1: PHP - Laravel - MySQL

Repositorio de base para el Proyecto 1 - 2019 - Laravel

## Creación del Fork

Debe realizar un fork de este repositorio en su propia cuenta de GitHub.
Una vez realizado esto, puede clonar su fork, y seguir las siguientes instrucciones para poder correr localmente el proyecto inicial en Laravel (ver requisitos mínimos [acá](https://laravel.com/docs/5.8#server-requirements)):

1. `git clone https://github.com/<UsuarioGitHub>/proyecto-1.git` clona localmente el fork del repositorio original, `<UsuarioGitHub>` **NO** debe ser `iaw-dcic`
1. `cd proyecto-1`
1. `composer install` instala dependencias
1. `cp .env.example .env` (`copy .env.example .env` en Windows) crea el archivo de configuración de entorno
1. `php artisan key:generate` agrega un api key aleatorio
1. `php artisan serve` inicializa el server

Eso debería permitirle acceder a http://127.0.0.1:8000

## Heroku

http://melo-iaw-dcic-proyecto-1.herokuapp.com

## Cambios para la re-entrega

+ Fue modificada la seguridad de la página, ahora ningún usuario registrado o visitante puede acceder (modificando la URL) a editar los datos de otro usuario, pelicula y/o lista.
+ Se modificó el checkbox de lista pública o privada. Ahora al momento de editar una lista, el checkbox aparecerá tildado o no según la información previamente almacenada. 
