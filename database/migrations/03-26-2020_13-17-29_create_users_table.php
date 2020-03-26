<?php

use App\Object\ServiceBus;

ServiceBus::get('database')->query(
"CREATE TABLE `users` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) UNIQUE,
    `password` VARCHAR(255),
    `email` VARCHAR(255))"
);
