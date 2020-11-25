<?php

use Engine\Settings;

Settings::set('env', [

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

]);
