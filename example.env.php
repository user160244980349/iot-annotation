<?php

define('ENV', [

    # Views path
    'views' => __DIR__ . '/resources/views/',

    # Debug prints
    'debug' => true,

    # Database credentials
    'db_driver' => 'mysql',
    'db_address' => 'localhost',
    'db_name' => 'database',
    'db_user' => 'user',
    'db_password' => 'secret',

    'commands' => __DIR__ . '/config/console.php',
    'middlewares' => __DIR__ . '/config/middlewares.php',
    'permissions' => __DIR__ . '/config/permissions.php',
    'routes' => __DIR__ . '/config/routes.php',
    'services' => __DIR__ . '/config/services.php',
    'migrations' => __DIR__ . '/database/migrations.php',
    'seeds' => __DIR__ . '/database/seeds.php'
]);
