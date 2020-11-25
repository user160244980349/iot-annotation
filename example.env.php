<?php

define('ENV', [

    # Views path
    'views' => __DIR__ . '/resources/views/',

    # Debug prints
    'debug' => true,

    # Database credentials
    'db_driver' => 'mysql',
    'db_address' => 'localhost',
    'db_name' => 'custom_bp_editor',
    'db_user' => 'custom-bp-editor',
    'db_password' => 'secret',

    'commands' => __DIR__ . '/config/console.php',
    'middlewares' => __DIR__ . '/config/middlewares.php',
    'permissions' => __DIR__ . '/config/permissions.php',
    'routes' => __DIR__ . '/config/routes.php',
    'services' => __DIR__ . '/config/services.php',
    'migrations' => __DIR__ . '/database/migrations.php',
    'seeds' => 'database/seeds.php'
]);
