<?php
return [
    'migrations_paths' => [
        'DoctrineMigrations' => __DIR__ . '/migrations', // Ruta de las migraciones
    ],
    'db' => [
        'driver' => 'pdo_mysql',
        'user' => 'root',         // Usuario de la base de datos
        'password' => '',         // Contraseña de la base de datos
        'dbname' => 'tu_base_de_datos', // Nombre de la base de datos
    ]
];
