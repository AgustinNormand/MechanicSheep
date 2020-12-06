<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://lh3.googleusercontent.com/proxy/7fZt14QvAaP2TEmzjxK0cOeTNLdvM0_j2IWOZaUuqgkFlyHc1d3y8EUP7NwuqDb0vtf8_nJPlpkziVsBqUmBplGSdUmQjQ0Iv8Z16I-prgORXLGRfzhiEhxbapEpPSQ" width="100"></a></p>

<h1 align="center">Seminario de Integración Profesional - MechanicSheep</h1>
<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalación y Ejecución (Development)

* git clone https://github.com/AgustinNormand/MechanicSheep.git
* cd MechanicSheep
* composer install
* cp .env.example .env
* Crear una base de datos
* Editar .env con los valores deseados
* Ejecutar migraciones: php artisan migrate
* Ejecutar: php artisan key:generate
* Ejecutar: php artisan serve

## Instalación y Ejecución (Deploy)

* git clone https://github.com/AgustinNormand/MechanicSheep.git
* cd MechanicSheep
* cp .env.example .env
* Editar .env con los valores deseados
* docker-compose build app
* docker-compose up -d

## Vulnerabilidades de seguridad

Si descrubre una vulnerabilidad de seguridad dentro del proyecto, envíe un correo electrónico a MechanicSheep a través de [Renault@MechanicSheep.com.ar](mailto:Renault@MechanicSheep.com.ar). Todas las vulnerabilidades de seguridad se abordarán de inmediato.

## Licencia

El proyecto es un software de código abierto con licencia bajo la [MIT license](https://opensource.org/licenses/MIT).
