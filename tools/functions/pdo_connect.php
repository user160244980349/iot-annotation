<?php

/**
 * Connecting to database with PHP Data Object
 *
 * @param $config
 * @return PDO
 */
function pdo_connect ($config) {
    $db = require_once $config;
    return new PDO(
        $db['driver'].':host='.$db['address'].';dbname='.$db['name'],
        $db['user'],
        $db['password']
    );
}
