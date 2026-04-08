# Laravel Base para el proyecto de Campus

Esta carpeta contiene el esquema de base de datos convertido a Laravel.

## Archivos generados

- `database/migrations/2026_04_08_000000_create_usuarios_table.php`
- `database/migrations/2026_04_08_000001_create_documentos_table.php`
- `database/migrations/2026_04_08_000002_create_herramientas_table.php`
- `database/migrations/2026_04_08_000003_create_historial_recomendaciones_table.php`
- `app/Models/Usuario.php`
- `app/Models/Documento.php`
- `app/Models/Herramienta.php`
- `app/Models/HistorialRecomendacion.php`

## Instalación rápida

1. Copia estos archivos dentro de un proyecto Laravel existente.
2. Ejecuta `composer install` y configura tu `.env`.
3. Ejecuta las migraciones:

```bash
php artisan migrate
```

## Notas

- Las tablas usan nombres en español para reflejar el modelo relacional.
- Los modelos Eloquent están configurados sin timestamps automáticos (`timestamps = false`).
- La relación entre las tablas está definida con claves foráneas y eliminación en cascada.

## Dockerización

Se han añadido los siguientes archivos para ejecutar el proyecto en Docker:

- `Dockerfile`
- `docker-compose.yml`
- `.dockerignore`

### Pasos para ejecutar con Docker

1. Coloca este contenido dentro de una carpeta de proyecto (por ejemplo, `campus/laravel`).
2. Si no tienes un proyecto Laravel completo, añade `composer.json` y los archivos estándar de Laravel antes de ejecutar.
3. Crea un archivo `.env` si no existe y ajusta las variables de base de datos.
4. En la carpeta `campus/laravel`, ejecuta:

```bash
docker compose up --build
```

5. Abre el navegador en:

```
http://127.0.0.1:8080
```

6. Si necesitas ejecutar migraciones desde el contenedor, primero instala Composer en el contenedor o monta la carpeta `vendor` y luego ejecuta:

```bash
docker compose exec app bash
composer install
php artisan migrate
```

### Conexión a la base de datos

- Host: `db`
- Puerto: `3306`
- Base de datos: `campus`
- Usuario: `campus_user`
- Contraseña: `secret`
- Root: `rootpassword`
