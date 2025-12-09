📘 CRM OBRAS — Documentación Técnica Base (README)
🏗️ Descripción del Proyecto

CRM OBRAS es un sistema interno de gestión de obras, presupuestos, usuarios, insumos y análisis de costos.
Se está desarrollando con:

Laravel 11 (backend/API REST)

MySQL 8 (base de datos)

Vue (Vite) (frontend, en etapa posterior)

Laragon (entorno local)

GitHub (repositorio remoto)

VSCode (editor principal)

📁 Estructura actual del proyecto
crm-obras/
│
├── app/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── public/
├── resources/
├── routes/
├── storage/
├── tests/
└── vendor/

🗂️ MODELOS, TABLAS Y RELACIONES

Este esquema sigue el diagrama original creado en Miro.
Vamos agregando tablas conforme se avanza en el desarrollo.

👤 1. Usuarios
Tabla: usuarios

Campos:

usuarioId (PK)

usuarioApodo

usuarioNombre

usuarioApellido

usuarioCorreo

usuarioClave

usuarioCel

usuarioRolId (FK → rol.rolId)

usuarioTipoId (FK → usuarios_tipo.tipoId)

usuarioEstadoId (FK → usuario_estado.estadoId)

usuarioFechaAlta

usuarioFechaNacimiento

timestamps

Tabla: usuarios_tipo

Tipos:

Interno

Cliente

Proveedor

Migración creada: ✔
Seeder creado: ✔

Tabla: usuario_estado

Estados:

Activo

Eliminado

Migración creada: ✔
Seeder creado: ✔

Tabla: rol

Roles administrativos:

1 = Activo

2 = Eliminado

Migración creada: ✔
Seeder creado: ✔

🔧 MIGRACIONES YA CREADAS

En /database/migrations se encuentran:

create_usuarios_tipo_table

create_usuario_estado_table

create_rol_table

Todas incluyen:

PK autoincremental

Campos respetando nombres EXACTOS del Miro

Estructura limpia en UTF8MB4

Ejemplo general de formato:

Schema::create('usuarios_tipo', function (Blueprint $table) {
    $table->id('tipoId');
    $table->string('tipoNombre');
    $table->timestamps();
});

🌱 SEEDERS YA CREADOS

En /database/seeders:

UsuariosTipoSeeder

UsuarioEstadoSeeder

RolSeeder

Ejecución:

php artisan db:seed


Todo confirmado con éxito en MySQL (HeidiSQL).

🛠️ ENTORNO DE DESARROLLO
Local

Laragon 8.x

PHP 8.3.26

MySQL 8.4

Node.js 20.x/22.x (vía Chocolatey)

Git 2.52

Composer 2.8.4

VS Code

Ramas en Git

main (rama principal)

Subida remota:

git remote add origin https://github.com/amiconeagustin/crm-obras.git
git push -u origin main

🔌 CONFIGURACIONES
Archivo .env

Conexión MySQL:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=crm_obras
DB_USERNAME=root
DB_PASSWORD=

🚀 PRÓXIMOS PASOS (ROADMAP)

✔ Usuarios_tipo
✔ Usuario_estado
✔ Rol
⬜ Modelo Usuario
⬜ Migration Usuarios
⬜ Seeders base para usuarios internos
⬜ Tabla PAISES
⬜ Tabla PROVINCIAS
⬜ Tabla LOCALIDADES
⬜ Tabla PARTIDOS
⬜ Tabla PRESUPUESTO
⬜ Tabla PRESUPUESTO_ITEM
⬜ Tabla INSUMOS
⬜ Tabla INSUMOS_ITEM
⬜ API REST modular
⬜ Autenticación mediante Laravel Breeze / Sanctum
⬜ Pantallas iniciales en Vue
⬜ CRUD completo de presupuestos
⬜ CRUD de insumos y análisis de costos

📎 NOTAS IMPORTANTES

Todos los nombres de las tablas y campos siguen el diagrama de Miro EXACTAMENTE, sin renombrar nada del modelo.

Toda relación pertenece al modelo de costos tradicional de construcción.

El proyecto está organizado para escalar fácilmente a:

App móvil

API externa

Panel administrativo ampliado

El repositorio está limpio, sin archivos generados automáticamente en GitHub.

🟩 Estado actual del proyecto
Área	Estado
Entorno local	✔ Completado
Laravel base	✔ Completado
Git + GitHub	✔ Conectado y funcionando
Migraciones iniciales	✔ usuarios_tipo, usuario_estado, rol
Seeders	✔ insert inicial de los 3 catálogos
Base de datos	✔ sincronizada
Backend	🟡 En progreso
Frontend	⬜ Aún no iniciado