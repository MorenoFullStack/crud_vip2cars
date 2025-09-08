# Proyecto de Encuestas Anónimas

## Diagrama de la Base de Datos Encuestas Anónimas
Puedes ver el **diagrama de la base de datos** en el archivo:
- **[Diagrama de la base de datos](docs/Diagrama_encuesta_anonimaDB.png)**

## Script SQL para la creación de la base de datos
El script SQL para crear las tablas necesarias está disponible en el archivo:
- **[Script SQL](Base_datos/Scrip_EncuestaAnonimas.sql)**

---

# Proyecto CRUD VIP2CARS - Taller Automotriz

## Descripción del Proyecto

Este proyecto es un sistema CRUD (Crear, Leer, Actualizar, Eliminar) para la gestión de vehículos y contactos en el taller automotriz VIP2CARS. El sistema permite registrar y gestionar vehículos y los datos de contacto de los clientes de manera eficiente, además de permitir consultas, actualizaciones y eliminación de los registros. La interfaz de usuario utiliza **DataTables** con **AJAX** para la gestión de los registros, y se emplea **SweetAlert2** para mostrar mensajes interactivos. Además, cuenta con un sistema de login básico con un usuario demo.

### Diagrama de la Base de Datos Vehiculos
Puedes ver el **diagrama de la base de datos** en el archivo:
- **[Diagrama de la base de datos](docs/diagrama_crud_vehiculosDB.png)**

### Script SQL para la creación de la base de datos
El script SQL para crear las tablas necesarias está disponible en el archivo:
- **[Script SQL](Base_datos/vip2cars_db.sql)**

## Requisitos del Entorno

- **PHP**: 8.2.12 o superior
- **Base de datos**: MariaDB 10.4.32 o superior (compatible con MySQL 5.7)
- **Laravel**: 12.28.1
- **Extensiones necesarias**:
  - PDO
  - mbstring
  - OpenSSL
  - json
  - cURL
- **Dependencias adicionales**:
  - **jQuery**: Utilizado para la manipulación del DOM y la integración con DataTables y SweetAlert2.
  - **DataTables**: Implementado para la visualización interactiva de tablas con soporte para búsqueda, ordenación y paginación.
  - **SweetAlert2**: Integrado para mostrar mensajes interactivos y alertas personalizadas.
  - **Bootstrap**: Utilizado para diseñar y estilizar la interfaz de usuario, proporcionando un diseño responsivo y componentes como formularios, botones, tablas, entre otros.

## Instalación y Configuración

1. **Clona este repositorio**:
   ```bash
   git clone https://github.com/MorenoFullStack/crud_vip2cars.git

2. **Instalar las dependencias de PHP**:
   ```bash
    cd crud_vip2cars

- **Instala las dependencias de PHP utilizando Composer:**
   ```bash
    composer install

3. **Instalar las dependencias de Node.js:**:
   ```bash
   npm install

4. **Configura las variables de entorno:**:
-Renombra el archivo .env.example a .env y configura los detalles de la base de datos, se encuentra por la fila 23:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nombre_de_tu_base_de_datos
    DB_USERNAME=tu_usuario
    DB_PASSWORD=tu_contraseña
- **En caso de no tener contraseña ni usuario dejarlo asi**

    DB_USERNAME=root
    DB_PASSWORD=

- **Si usa xampp simplemente crea una nueva base de datos vacia**
- **de nombre vip2cars_db o cualquiera nombre y lo pone en su DB_DATABASE**

    DB_DATABASE=vip2cars_db

6. **Genera la clave de aplicación:**:
   ```bash
   php artisan key:generate

7. **Ejecuta las migraciones y seeds:**:
   ```bash
   php artisan migrate --seed

7. **Levanta el servidor de desarrollo:**:
   ```bash
   npm run dev

## Funcionalidades del CRUD

El sistema incluye las siguientes funcionalidades para la gestión de vehículos y contactos:

- **Crear**: Formulario para agregar un nuevo vehículo o contacto.
- **Leer**: Visualizar los registros de vehículos y contactos en una tabla, utilizando **DataTables** con soporte para búsqueda, ordenación y paginación.
- **Actualizar**: Editar los registros existentes de vehículos y contactos.
- **Eliminar**: Opción para eliminar registros de vehículos y contactos.

## Sistema de Login Demo

El sistema incluye un **login demo** con las siguientes credenciales de acceso:

- **Email**: luis@gmail.com
- **Contraseña**: 123

El sistema tiene un **header** con navegación y permite acceder a las funcionalidades del CRUD una vez que el usuario se autentica.

## Suma de Puntos (Extras)

El sistema implementa las siguientes características adicionales:

- **Validaciones**: Todos los campos del formulario tienen validaciones, incluyendo la verificación de formato para correo electrónico, teléfono y número de documento. Esto garantiza que los datos ingresados sean válidos antes de ser almacenados en la base de datos.

- **Migraciones**: Se incluyen migraciones para crear las tablas necesarias en la base de datos. Esto facilita la creación y estructuración de la base de datos al iniciar el proyecto.

- **Paginación y Búsqueda**: Se incluye paginación para los registros de vehículos y contactos, lo que permite navegar fácilmente por grandes cantidades de datos. También se ha implementado una funcionalidad de búsqueda por nombre, placa o documento para facilitar la localización de registros específicos.

- **Limpieza del código**: El código sigue las mejores prácticas y está organizado conforme a las convenciones de Laravel. Se ha mantenido un estilo de código limpio y legible, utilizando correctamente las funciones del framework para garantizar la escalabilidad y mantenibilidad del proyecto.