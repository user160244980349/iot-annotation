<?php

/**
 * Include helpful things
 */
require_once __DIR__ . '/functions/pdo_connect.php';

$pdo = pdo_connect( __DIR__ . '/../config/database.php');

$pdo->query('
    DROP TABLE `user`
');
$pdo->query('
    CREATE TABLE `user` (
        `user_id` int AUTO_INCREMENT, 
        `user_name` varchar(30), 
        `user_password` varchar(32), 
        `user_hash` varchar(30), 
        `user_ip` int(10),
        PRIMARY KEY (`user_id`)
    )
');

$pdo = null;
