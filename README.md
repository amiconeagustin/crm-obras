# 🧱 CRM OBRA — Sistema de Gestión de Obras, Presupuestos e Insumos  
Documentación Técnica Base

CRM OBRA es un sistema interno para la gestión integral de obras, presupuestos, usuarios, insumos y análisis de costos.  
El desarrollo se realiza siguiendo una arquitectura moderna basada en API REST.

---

## 🛠️ Tecnologías del Proyecto

| Capa | Tecnología | Estado |
|------|------------|--------|
| Backend | **Laravel 11** | ✔️ Activo |
| Frontend | **Vue 3 (Vite)** | ⏳ Próxima etapa |
| Base de datos | **MySQL 8** | ✔️ Activo |
| Entorno local | **Laragon** | ✔️ Activo |
| Control de versiones | **Git + GitHub** | ✔️ Activo |
| Editor principal | **Visual Studio Code** | ✔️ Activo |

---

## 📁 Estructura del Proyecto (resumen)

crm-obras/
│── app/
│── bootstrap/
│── config/
│── database/
│ ├── migrations/
│ ├── seeders/
│ └── factories/
│── public/
│── resources/
│── routes/
│── storage/
│── tests/
│── vendor/
└── README.md


---

# 📐 Modelo de Datos — Diagrama General

El modelo sigue el esquema diseñado en **Miro**.  
El proyecto utiliza migraciones versionadas y seeders para garantizar datos base consistentes.

---

# 👥 1. Módulo de Usuarios

### 🧩 Tabla: **usuarios**
Campos principales:

| Campo | Tipo | Comentario |
|-------|------|------------|
| `usuarioId` | BIGINT PK | Identificador |
| `usuarioApodo` | VARCHAR | Username interno |
| `usuarioNombre` | VARCHAR | Nombre |
| `usuarioApellido` | VARCHAR | Apellido |
| `usuarioCorreo` | VARCHAR | Email único |
| `usuarioClave` | VARCHAR | Hash de contraseña |
| `usuarioTel` | VARCHAR | Teléfono |
| `usuarioTipoId` | FK | (Interno / Cliente / Proveedor) |
| `usuarioEstadoId` | FK | (Activo / Eliminado) |
| `usuarioFechaAlta` | DATE | Fecha de alta |
| `usuarioFechaNacimiento` | DATE | Fecha de nacimiento |
| `timestamps` | Laravel | creado / actualizado |

Relaciones:

- Un **usuarioTipo** tiene muchos **usuarios**  
- Un **usuarioEstado** tiene muchos **usuarios**

---

### 🧩 Tabla: **usuarios_tipo**
Valores iniciales (seed):

| ID | Tipo |
|----|-------|
| 1 | Interno |
| 2 | Cliente |
| 3 | Proveedor |

---

### 🧩 Tabla: **usuario_estado**
Valores iniciales (seed):

| ID | Estado |
|----|---------|
| 1 | Activo |
| 2 | Eliminado |

---

# 🎭 2. Roles (ACL inicial)

### 🧩 Tabla: **rol**

Campos:

| Campo | Tipo |
|-------|------|
| `rolId` | PK |
| `rolNombre` | VARCHAR |
| `rolEstado` | BOOLEAN (1 activo / 0 inactivo) |

---

# 🏗️ 3. Estado actual del desarrollo

### ✔️ Finalizado
- Configuración del entorno local (Laragon, PHP, MySQL)
- Repositorio GitHub conectado
- Proyecto Laravel 11 inicializado
- Migraciones creadas:
  - usuarios_tipo
  - usuario_estado
  - rol
  - (users de Laravel no se usa)
- Seeders creados para tablas base
- Conexión MySQL funcionando

### ⏳ Próximos pasos
1. Crear migración y modelo de **usuarios**
2. Implementar seeders de prueba
3. Crear controladores base
4. Construir endpoints del módulo Usuarios (API REST)
5. Autenticación vía Laravel Sanctum
6. Comenzar módulo de Presupuestos

---

# 📌 Notas técnicas importantes
- El proyecto utiliza **PKs personalizadas** (ej: usuarioId), no `id` por defecto.
- Todas las FK utilizan **nombres explícitos** (usuarioTipoId, presuItemId, etc.)
- El proyecto seguirá el diagrama en Miro como fuente principal del modelo de datos.
- Todo cambio estructural debe reflejarse en migraciones y no editarse manualmente en MySQL.

---

# 🧾 Licencia
Proyecto privado interno — © 2025 Agustín Amicone  
