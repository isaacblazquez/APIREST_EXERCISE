# APIREST_EXERCISE
EXERCISE BUILD A APIREST


Configuración del esqueleto

Controller
│   └── Api
│       ├── BaseController.php
│       └── UserController.php
├── inc
│   ├── bootstrap.php
│   └── config.php
├── index.php
└── Model
    ├── Database.php
    └── UserModel.php

Índice.php: 
el punto de entrada de nuestra aplicación. Actuará como un controlador frontal de nuestra aplicación.

inc/config.php: 
contiene la información de configuración de nuestra aplicación. Principalmente, contendrá las credenciales de la base de datos.

Inc/Bootstrap.php: 
Se utiliza para arrancar nuestra aplicación incluyendo los archivos necesarios.

Modelo/Base de datos.php: 
la capa de acceso a la base de datos que se utilizará para interactuar con la base de datos MySQL subyacente.

Model/UserModel.php: el archivo de modelo que implementa los métodos necesarios para interactuar con la tabla de usuarios en la base de datos MySQL.User

Controller/Api/BaseController.php: 
un archivo de controlador base que contiene métodos de utilidad comunes.

Controller/Api/UserController.php:
el archivo del controlador que contiene el código de aplicación necesario para entretener las llamadas a la API REST.User

Crear una base de datos y clases de modelo

CREATE TABLE `users` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

Rellenamos los datos en la tabla para tener una muestra de datos con los que poder jugar.


Crear clases de modelo

Database.php

UserModel.php


Crear componentes de capa de aplicación




El directorio del controlador


El índice.php
