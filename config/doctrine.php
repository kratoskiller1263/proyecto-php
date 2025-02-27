<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Path to your entities
$paths = [__DIR__ . '/src/Entity'];

// Set up the database connection configuration
$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root', // Replace with your DB username
    'password' => '',     // Replace with your DB password
    'dbname'   => 'your_database_name', // Replace with your DB name
];

// Setup Doctrine configuration
$config = Setup::createAnnotationMetadataConfiguration($paths, true);

// Create the EntityManager
$entityManager = EntityManager::create($dbParams, $config);
