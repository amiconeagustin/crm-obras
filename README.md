# 🏗️ CRM OBRAS — Documentación Técnica Base

Sistema interno para la gestión de obras, presupuestos, usuarios, insumos, costos y análisis técnico-económico.

Desarrollado con:

- **Laravel 11** (Backend / API REST)
- **MySQL 8** (Base de datos)
- **Vue (Vite)** (Frontend – etapa posterior)
- **Laragon** (Entorno local)
- **Postman** (Testing APIs)
- **GitHub** (Repositorio remoto)
- **VSCode** (Editor principal)

---

## 📁 Estructura actual del proyecto

```txt
crm-obras/
│── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Api/
│   │   │   │   ├── UsuarioController.php
│   │   │   │   └── InsumoController.php
│   │   │   └── Controller.php
│   │   └── Models/
│   │       ├── Usuario.php
│   │       ├── UsuarioTipo.php
│   │       ├── UsuarioEstado.php
│   │       ├── Rol.php
│   │       ├── Insumo.php
│   │       ├── InsumoTipo.php
│   │       └── UnidadAplicacion.php
│
├── database/
│   ├── migrations/
│   └── seeders/
│
├── routes/
│   ├── api.php
│   └── web.php
```

---

# 📌 Módulos implementados al día de hoy

---

## 👤 1. **Usuarios (CRUD + Login + Protecciones)**

### Tablas relacionadas:
- `usuarios`
- `usuarios_tipo`
- `usuario_estado`
- `rol`

### Endpoints:

GET /api/usuarios
GET /api/usuario/{id}
POST /api/usuarios
PUT /api/usuario/{id}
DELETE /api/usuario/{id}
POST /api/login


### Funcionalidades completadas:
- CRUD completo
- Validaciones completas
- Login con **Bearer Token**
- Rutas protegidas
- Relaciones cargadas automáticamente (tipo, estado, rol)

---

## 🧱 2. **Insumos (CRUD completo)**

### Tabla:
- `insumos`
- `insumos_tipo`
- `unidades_aplicacion`

### Endpoints:

GET /api/insumos
GET /api/insumo/{id}
POST /api/insumos
PUT /api/insumo/{id}
DELETE /api/insumo/{id}


### Funcionalidades implementadas:
- Validaciones correctas
- Relación con unidad de aplicación OK
- Tipos de insumo OK
- CRUD probado en Postman con éxito

---

# 🧪 Testing API

Se utiliza **Postman** con:

- Login → obtener Bearer Token  
- Setear en cada request:

Authorization → Bearer Token


---

# 🔒 Seguridad

- Autenticación por Token
- Middleware `auth:sanctum` en endpoints protegidos
- Formato de respuesta estándar JSON

---

# 🚀 Estado actual del proyecto

Módulos completados al día de hoy:

| Módulo | Estado |
|-------|--------|
| Usuarios CRUD | ✅ Completado |
| Login | ✅ Completado |
| Insumos CRUD | ✅ Completado |
| Relaciones base | ✅ Completado |
| Rutas API | ✅ Completado |
| Validaciones | ✅ Completado |

---

# 📆 Próximos pasos

1. CRUD de **Presupuestos**
2. CRUD de **Items por Presupuesto**
3. Motor de costos → cálculo automático
4. API del Dashboard
5. Frontend con Vue

---

# 👨‍💻 Autor

**Agustín Amicone**  
Desarrollo + Arquitectura del sistema

---