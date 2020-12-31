<?php

use Engine\Config;

Config::set('env', [

    # Views path
    'views' => __DIR__ . '/views',

    # Debug prints
    'debug' => true,

    # Database credentials
    'db_driver'   => 'mysql',
    'db_address'  => 'localhost',
    'db_name'     => 'php_engine',
    'db_user'     => 'php_engine',
    'db_password' => 'secret',

]);
