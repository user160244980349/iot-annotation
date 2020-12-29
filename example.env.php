<?php

define('ENV', [

    # Views path
    'views' => __DIR__ . '/views/',

    # Debug prints
    'debug' => true,

    # Database credentials
    'db_driver'   => 'mysql',
    'db_address'  => 'localhost',
    'db_name'     => 'php_engine',
    'db_user'     => 'php_engine',
    'db_password' => 'secret',

    'middlewares' => __DIR__ . '/config/middlewares.php',
    'permissions' => __DIR__ . '/config/permissions.php',
    'routes'      => __DIR__ . '/config/routes.php',
    'services'    => __DIR__ . '/config/services.php',

]);
