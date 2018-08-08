<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>



# APP Laravel 5.6 - WordPress CRUD usando el API-REST v2

Aplicación Laravel que realiza las operaciones básicas de CRUD (Create - Read - Update - Delete) sobre los posts de cualquier sitio WordPress, utilizando el [WP REST API v2](http://v2.wp-api.org/)

- composer.json

```
    "php": "^7.1.3",
    "fideloper/proxy": "^4.0",
    "guzzlehttp/guzzle": "~6.0",
    "laravel/framework": "5.6.*",
    "laravel/tinker": "^1.0"
```

NOTA: Se requiere que tenga instalado y habilitado en su sitio Wordpress el siguiente complemento para poder autenticarse  y ejecutar peticiones [ POST/DELETE ]


## Basic Authentication handler


Este complemento agrega Autenticación básica a un sitio de WordPress.

NOTA: Tenga en cuenta que este complemento requiere el envío de su nombre de usuario y contraseña con cada
solicitud, y solo debe usarse a través de conexiones con seguridad SSL o para
desarrollo y prueba. Sin SSL, recomiendo utilizar 
[OAuth versión 1 o 2 ] -[OAuth1](https://github.com/WP-API/OAuth1)   controlador de autenticación en entornos de producción.

## Instalación

1. Descargue e instale el plugin en el directorio /wp-content/plugins de su sitio wordpress
 - [WP-API / Basic-Auth](https://github.com/WP-API/Basic-Auth)

2. Habilitar el plugin desde administrador de Wordpress


## GuzzleHttp\Client
La aplicación requiere del cliente GuzzleHttp para que funcione correctamente y pueda conectarse al sitio Wordpress.
Aquí te dejo el link para su descarga y documentación.

- [GuzzleHttp\Client](http://docs.guzzlephp.org/en/stable/overview.html)

```
composer require guzzlehttp/guzzle:~6.0
```

## Modo de Uso
- Por default los usuarios WordPress Administrador/Autor/Editor tienen permisos de escritura.
- Por default los usuarios WordPress Colaborador/Suscriptor solo tienen permisos de lectura. 
- Importante: las peticiones GET no requiere user/pass solo peticiones de tipo POST/DELETE

Configure el usuario, password y la URL del sitio Wordpress al que desea conectarse en el controlador BlogController.php

IMPORTEATE: Tanto el usuario como el password son encriptados con base64_encode antes del envío de la solicitud en el header de la petición. 

- Path: app/Http/Controllers/BlogController.php

```
    protected $base_uri = 'http://wordpress.localhost'; // URL base del sitio
    protected $username = 'user'; // username de wordpress
    protected $password = 'pass'; // password de wordpress
```

## Screenshots

#### Index

<img src="http://miguelzdanovich.com/img/demo-app-laravel/index.png" width="350" alt="Index">

#### New

<img src="http://miguelzdanovich.com/img/demo-app-laravel/new.png" width="350" alt="New">

#### Edit

<img src="http://miguelzdanovich.com/img/demo-app-laravel/edit.png" width="350" alt="Edit">

#### Error

<img src="http://miguelzdanovich.com/img/demo-app-laravel/error.png" width="350" alt="Error">

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
