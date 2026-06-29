````markdown
# ☕ Aroma Molido

<p align="center">

## Sistema de Gestión para Cafetería y Tienda Online

Proyecto desarrollado con **Laravel 12**

---

**Integrantes**

👨‍💻 Ojeda Agustín  
👨‍💻 Reyes Kevin

</p>

---

# 📖 Descripción

**Aroma Molido** es una aplicación web desarrollada con **Laravel 12**, diseñada para administrar una cafetería y su tienda online.

El sistema permite gestionar productos, pedidos, usuarios, categorías y demás funcionalidades necesarias para el funcionamiento del negocio.

---

# 🚀 Tecnologías utilizadas

| Tecnología | Versión |
|------------|---------|
| Laravel | 12 |
| PHP | 8.2 o superior |
| MySQL / MariaDB | Compatible |
| Composer | Última versión |
| Node.js | 18+ recomendado |
| Vite | Incluido |
| Tailwind CSS | Incluido |
| Blade | Motor de plantillas |

---

# ✅ Requisitos

Antes de comenzar, asegúrese de tener instalado:

- PHP 8.2 o superior
- Composer
- Node.js
- npm
- MySQL o MariaDB
- Git

Puede utilizar cualquiera de los siguientes entornos:

- XAMPP
- Laragon
- WampServer

---

# 📥 Instalación

## 1. Clonar el repositorio

```bash
git clone <URL_DEL_REPOSITORIO>
```

Ingresar a la carpeta del proyecto

```bash
cd aroma-molido
```

---

## 2. Instalar dependencias de PHP

```bash
composer install
```

---

## 3. Instalar dependencias de JavaScript

```bash
npm install
```

---

## 4. Configurar el archivo de entorno

Copiar el archivo de configuración:

Linux / Mac

```bash
cp .env.example .env
```

Windows

```cmd
copy .env.example .env
```

---

## 5. Configurar la Base de Datos

Crear una base de datos vacía en MySQL.

Ejemplo:

```
aroma_molido
```

Editar el archivo `.env` con sus credenciales.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aroma_molido
DB_USERNAME=root
DB_PASSWORD=
```

---

## 6. Generar la clave de Laravel

```bash
php artisan key:generate
```

---

## 7. Ejecutar las migraciones

```bash
php artisan migrate
```

---

## 8. Cargar los datos iniciales

El proyecto ya incluye **Seeders** con información de prueba.

Ejecutar:

```bash
php artisan db:seed
```

Si desea reinstalar completamente la base de datos:

```bash
php artisan migrate:fresh --seed
```

> ⚠️ Este comando elimina toda la información existente.

---

## 9. Crear el enlace simbólico para almacenamiento

```bash
php artisan storage:link
```

---

## 10. Compilar los archivos del frontend

Modo desarrollo

```bash
npm run dev
```

Modo producción

```bash
npm run build
```

---

## 11. Ejecutar el servidor

```bash
php artisan serve
```

Abrir en el navegador:

```
http://127.0.0.1:8000
```

---

# 👤 Usuario Administrador

Una vez ejecutados los **Seeders**, podrá ingresar con el siguiente usuario:

| Campo | Valor |
|--------|-------|
| **Email** | `admin@admin.com` |
| **Contraseña** | `admin123` |

---

# 📂 Estructura del proyecto

```
app/
bootstrap/
config/
database/
│
├── factories/
├── migrations/
└── seeders/
│
public/
resources/
routes/
storage/
tests/
vendor/
```

---

# 🛠 Comandos útiles

### Limpiar toda la caché

```bash
php artisan optimize:clear
```

### Limpiar configuración

```bash
php artisan config:clear
```

### Limpiar rutas

```bash
php artisan route:clear
```

### Limpiar vistas

```bash
php artisan view:clear
```

### Ver las rutas registradas

```bash
php artisan route:list
```

---

# ⚠️ Solución de problemas

## Error de conexión con la base de datos

Verifique que:

- MySQL esté iniciado.
- La base de datos exista.
- Las credenciales del archivo `.env` sean correctas.

---

## Error al cargar imágenes

Ejecute:

```bash
php artisan storage:link
```

---

## Error con dependencias

Actualizar Composer

```bash
composer install
```

Actualizar Node

```bash
npm install
```

---

## Error con permisos

Ejecutar:

```bash
php artisan optimize:clear
```

---

# 🌱 Datos iniciales

El proyecto incluye Seeders con datos de ejemplo para facilitar las pruebas del sistema.

Para volver a cargar todos los datos:

```bash
php artisan migrate:fresh --seed
```

---

# 📄 Licencia

Este proyecto fue desarrollado con fines educativos y académicos.

---

<p align="center">

## ☕ Aroma Molido

Desarrollado por

**Ojeda Agustín**  
**Reyes Kevin**

Laravel 12 • 2026

</p>
````
