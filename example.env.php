<?php

use Engine\Config;

Config::set('env', [

    # Debug prints
    'debug' => true,

    # Views path
    'views'       => __DIR__ . '/views',
    'resources'   => __DIR__ . '/resources',

    # Database credentials
    'db_driver'   => 'mysql',
    'db_address'  => 'db',
    'db_name'     => 'iot_annotation',
    'db_user'     => 'iot_annotation',
    'db_password' => 'secret',

]);
