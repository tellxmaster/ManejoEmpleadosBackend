# Employee Management Backend

Este proyecto fue construido con [Lumen PHP Framework](https://lumen.laravel.com/docs/11.x)
micro-framework de Laravel.

## Requisitos

-   Gestor de paquetes [Composer version 2.7.3](https://getcomposer.org)
-   Entorno de desarrollo [XAMPP PHP version 8.2.12](https://www.apachefriends.org/es/index.html)

> **Note:** Aparte de XAMPP se pueden utilizar servidores de Apache y MySQL dedicados o contenedores de docker en su defecto, realizando las configuraciones en el archivo `.env`

## Instalación

1. Clonar el repositorio

```sh
git clone https://github.com/tellxmaster/ManejoEmpleadosBackend.git
```

2. Navegar a la carpeta

```sh
cd ManejoEmpleadosBackend
```

3. Instalar dependencias

```sh
composer install
```

4. Habilitar tanto el servidor Apache como la Base de datos en XAMPP o en Docker.
5. Configurar variables de entorno en `.env` en caso de ser necesario

```
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=employee_management
DB_USERNAME=root
DB_PASSWORD=
```

6. Migrar datos (Generar Base de datos) con el comando

```sh
php artisan:migrate
```

> **Note:** Al ejecutar nos preguntara si queremos crear la base de datos en caso de que no exista.

7. Insetar datos de prueba con

```sh
php artisan db:seed
```

8. Enlazar `storage` con la carpeta `public` con el comando

```sh
php artisan storage:link
```

9. Correr el servidor

```sh
php -S localhost:8000 -t public
```

Una vez hecho esto se puede configurar el [Frontend](https://github.com/tellxmaster/ManejoEmpleadosFront)

## Licencia

Para más información sobre las condiciones de uso de este software, por favor revisa el [archivo de licencia](LICENSE).
