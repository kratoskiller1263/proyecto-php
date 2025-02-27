# PHP Application with Domain-Driven Design (DDD) and Doctrine

Este repositorio implementa una aplicación PHP siguiendo los principios de **Domain-Driven Design (DDD)** y **Clean Architecture**. La aplicación gestiona el registro de usuarios y utiliza **Doctrine ORM** para la persistencia de datos en **MySQL**. El proyecto está diseñado para cumplir con los requisitos técnicos y las mejores prácticas, incluyendo pruebas automatizadas y despliegue en **Docker**.

## Características Técnicas

### 1. **Modelado de Dominio**

- **Entidades**: La entidad `User` está correctamente diseñada, con atributos como:
  - `id`: Un **Value Object** que representa una identidad única.
  - `name`: Un **Value Object** que valida la longitud mínima y caracteres permitidos.
  - `email`: Un **Value Object** con validación de formato de email.
  - `password`: Un **Value Object** con gestión de hash y validación.
  - `createdAt`: Fecha de creación automática.
  
- La entidad `User` es **inmutable** siempre que sea posible.

### 2. **Repositorio de Usuarios**

- **Interfaces**: El repositorio `UserRepositoryInterface` define métodos como:
  - `save(User $user): void`
  - `findById(UserId $id): ?User`
  - `delete(UserId $id): void`

- **Implementación**: `DoctrineUserRepository` maneja la persistencia utilizando **Doctrine ORM**.

### 3. **Caso de Uso: Registro de Usuario**

- **`RegisterUserUseCase`**: Gestiona el registro de un nuevo usuario.
  - Recibe los datos a través de un **DTO** (`RegisterUserRequest`).
  - Valida que el email no esté en uso antes de registrar al usuario.
  - Dispara un evento de dominio `UserRegisteredEvent` al completar el registro.

### 4. **Eventos de Dominio**

- **`UserRegisteredEvent`**: Disparado después de registrar un usuario.
- **Manejador de Eventos**: Escucha `UserRegisteredEvent` y ejecuta acciones como enviar un correo de bienvenida.

### 5. **Controlador y Formato de Respuesta**

- **`RegisterUserController`**: Recibe solicitudes HTTP y llama al caso de uso.
- Respuesta en formato **JSON** utilizando un **DTO** (`UserResponseDTO`).

### 6. **Seguridad y Validaciones**

- **Contraseña**: Cumple con los siguientes requisitos:
  - Mínimo 8 caracteres.
  - Al menos una letra mayúscula, un número y un carácter especial.
  
- **Validaciones**:
  - **Email**: Se valida con un formato correcto.
  - Si el email es inválido, lanza una `InvalidEmailException`.
  - Si la contraseña no cumple los requisitos, lanza una `WeakPasswordException`.
  - Si el email ya está registrado, lanza una `UserAlreadyExistsException`.

### 7. **Pruebas Automatizadas**

- **Pruebas Unitarias**:
  - La entidad `User`, sus **Value Objects** (`UserId`, `Email`, `Name`, `Password`).
  - El caso de uso `RegisterUserUseCase`.
  
- **Pruebas de Integración**: Verificación de que el repositorio funcione correctamente con **Doctrine** y **MySQL**.

### 8. **Docker**

- **Despliegue**: El entorno está configurado con **Docker** y **Docker Compose**.
  - Incluye un servicio para **PHP** con **Doctrine** y **Composer** instalados.
  - Un servicio para **MySQL** como base de datos.
  
- **Comandos Docker**:
  - `docker-compose up --build` para levantar los servicios.
  - `docker exec -it <container_name_php> php bin/console doctrine:migrations:migrate` para ejecutar las migraciones.

## Instrucciones de Uso

1. **Clonar el repositorio**:

git clone https://github.com/usuario/proyecto.git
cd proyecto

    Levantar los servicios con Docker:

docker-compose up --build

    Ejecutar migraciones para crear la base de datos:

docker exec -it <container_name_php> php bin/console doctrine:migrations:migrate

    Registrar un usuario mediante un POST a /register:

{
  "name": "John Doe",
  "email": "johndoe@example.com",
  "password": "StrongPassword123!"
}
