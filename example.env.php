<?php

return [

    # Root path of the project
    'root' => __DIR__,

    # Debug prints
    'debug' => true,

    # Database credentials
    'database' => [

        'driver' => 'mysql',
        'address' => 'localhost',
        'name' => 'custom_bp_editor',
        'user' => 'custom-bp-editor',
        'password' => 'secret',

    ],

    # Filesystem configurations
    'filesystem' => [

        # App
        'permissions' => '/config/access.php',
        'routes' => '/config/routes.php',
        'database' => '/config/database.php',

        # Views path
        'views' => '/views',

        # Migrations and seeds
        'migrations' => '/database/migrations',
        'migrations_list' => '/config/list_migrations.php',
        'seeds' => '/database/seeds',
        'seeds_list' => '/config/list_seeds.php',

        # Engine configs
        'console' => '/config/console.php',
        'services' => '/config/services.php',
        'middlewares' => '/config/middlewares.php',
        'middlewares_fallback' => '/config/middlewares_fallback.php',

    ]

];
