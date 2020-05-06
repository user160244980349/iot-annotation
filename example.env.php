<?php

return [

    # Root path of the project
    'root' => __DIR__,

    # Debug prints
    'debug' => false,

    # Database credentials
    'database' => [

        'driver' => 'mysql',
        'address' => 'localhost',
        'name' => 'phpengine',
        'user' => 'user',
        'password' => 'secret',

    ],

    # Filesystem configurations
    'filesystem' => [

        # App
        'permissions' => '/config/access.php',
        'routes' => '/config/routes.php',
        'database' => '/config/database.php',

        # Templates path
        'templates' => '/templates',

        # Migrations and seeds
        'migrations' => '/database/migrations',
        'migrations_list' => '/config/list_migrations.php',
        'seeds' => '/database/seeds',
        'seeds_list' => '/config/list_seeds.php',

        # Engine configs
        'console' => '/config/console.php',
        'services' => '/config/services.php',
        'mediators' => '/config/mediators.php',
        'mediators_fallback' => '/config/mediators_fallback.php',

    ]

];