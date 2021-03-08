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
    'db_name'     => 'iot_annotation',
    'db_user'     => 'iot_annotation',
    'db_password' => 'secret',

]);
