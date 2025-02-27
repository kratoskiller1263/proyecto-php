<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Define el arreglo de rutas de las entidades
$paths = [__DIR__ . "/src/Entities"];  // Asegúrate de que la ruta sea correcta a donde están tus entidades

// Define el modo de desarrollo
$isDevMode = true;  // En producción ponlo como false

// Configura la conexión a la base de datos
$conn = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'tu_contraseña',
    'dbname'   => 'nombre_base_datos',
);

// Configura Doctrine con el lector adecuado, deshabilitando SimpleAnnotationReader
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);

// Crea el EntityManager
$entityManager = EntityManager::create($conn, $config);
