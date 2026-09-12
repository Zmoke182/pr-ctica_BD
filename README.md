# API REST de Libreria (Laravel y Supabase)

Proyecto desarrollado para la practica de Bases de Datos en la Nube. Consiste en una API REST conectada a una base de datos relacional en Supabase.

## Estructura y Diseno de la Base de Datos
El modelo relacional cuenta con tres tablas interconectadas mediante llaves primarias (PK) y foraneas (FK):
- **autores** (PK: id)
- **libros** (PK: id, FK: autor_id)
- **ventas** (PK: id, FK: libro_id)

## Tecnologias
- Framework: Laravel (PHP)
- Base de datos: PostgreSQL (Supabase Cloud)
- Pruebas de API: Postman

## Conexion y Variables de Entorno
Configuracion de la conexion establecida en el archivo `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=aws-0-us-west-2.pooler.supabase.com
DB_PORT=6543
DB_DATABASE=postgres
DB_USERNAME=postgres.tu-usuario-supabase
DB_PASSWORD=tu-contrasena
DB_SSLMODE=require
```
## Instrucciones de Instalacion

Sigue estos pasos para clonar y ejecutar el proyecto en tu entorno local:

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/Zmoke182/pr-ctica_BD.git](https://github.com/Zmoke182/pr-ctica_BD.git)
   cd pr-ctica_BD
   ````
2. **Instalar las dependencias**
   ```bash
   composer install
   ````
3. **Actualizar el .env:**
   ```bash
   Introducir al .env los datos de la bd vistos anteriormente
   ````
4. **Iniciar el servidor:**
   ```bash
   PHP artisan serve
   ````
   <img width="1070" height="335" alt="imagen_2026-09-11_193107607" src="https://github.com/user-attachments/assets/a75274f0-163c-47e6-b623-ac1a63651a21" />


## Pruebas de postman
Aquí estan imagenes de algunas pruebas que se realizaron pero hay un video al final del readme con el que se pueda ver mejor el funcionamiento

## peticiones
get
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/5da673d7-d27d-45cd-a640-7f80a96c25cc" />

put
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/0dfb3fa1-ff6b-4b46-a9e8-9d4d7984fe2a" />

delete
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/480349aa-08d0-4c6c-95b8-28171bd26d3d" />

post
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/9e7ab9a4-33c7-48b9-a832-1b3ee4dddf38" />

## estatus
estatus 200
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/5da673d7-d27d-45cd-a640-7f80a96c25cc" />

estatus 201
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/9e7ab9a4-33c7-48b9-a832-1b3ee4dddf38" />

estatus 400
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/7e04bcb9-9cbb-4891-a535-6693283c4d94" />

estatus 404
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/a78d4cf6-c45e-479c-b104-c2fa99e23535" />

estatus 500
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/598a15c0-b4f6-46c1-9470-6dd7a5783890" />

## [Ver video de demostración en YouTube](https://youtu.be/kgLS3Tgk46Y)
