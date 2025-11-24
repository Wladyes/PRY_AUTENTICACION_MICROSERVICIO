<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# PRY_AUTENTICACION_MICROSERVICIO

## Descripción General

Este proyecto corresponde al microservicio de Autenticación desarrollado como parte del trabajo académico en la materia Arquitectura de Software. Su función es gestionar el ciclo completo de autenticación de usuarios mediante Laravel Sanctum, generando tokens seguros que permiten el acceso a otros microservicios dentro del sistema distribuido.

Este servicio opera de manera autónoma, cuenta con su propia base de datos en MySQL y expone endpoints REST que permiten el registro, inicio de sesión y validación de tokens.

## Tecnologías Utilizadas

* PHP 8.x
* Laravel 12
* MySQL
* Laravel Sanctum
* Composer

## Funcionalidades Principales

* Registro de usuarios.
* Inicio de sesión con credenciales.
* Generación de tokens personales con Sanctum.
* Endpoint de validación de tokens para consumo desde otros servicios.
* Respuestas estandarizadas en formato JSON.

## Endpoints

| Método | Endpoint            | Descripción                         |
| ------ | ------------------- | ----------------------------------- |
| POST   | /api/register       | Registro de un nuevo usuario        |
| POST   | /api/login          | Inicio de sesión y emisión de token |
| GET    | /api/validate-token | Validación de token con Sanctum     |

## Instalación

1. Clonar el repositorio.
2. Instalar dependencias:

   ```
   composer install
   ```
3. Configurar el archivo `.env` con los parámetros de conexión a MySQL.
4. Ejecutar migraciones:

   ```
   php artisan migrate
   ```
5. Iniciar el servidor:

   ```
   php artisan serve --port=8000
   ```

## Base de Datos

El microservicio trabaja con una base MySQL dedicada. Sanctum administra la tabla `personal_access_tokens` donde se almacenan los tokens generados por cada usuario.

## Autor

Wladymir Escobar
[gwescobar@espe.edu.ec](mailto:gwescobar@espe.edu.ec)
Trabajo académico – Arquitectura de Software

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
