<?php

# Important directories
$config = [
    'root'      => __DIR__ . '/..',
    'routes'    => __DIR__ . '/../routes.php',
    'database'    => __DIR__ . '/../database.php',
    'language'    => __DIR__ . '/../language.php',
    'templates'      => __DIR__ . '/../templates',
];

# Import composer autoloader
require __DIR__ . '/../vendor/autoload.php';

# Call application
$app = new App\Core\Application();