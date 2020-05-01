<?php

use Engine\Entity\ServiceBus;

ServiceBus::get('database')->query(
<<<EOQ
CREATE TABLE `users` (
    `id`        INT PRIMARY KEY AUTO_INCREMENT,
    `name`      VARCHAR(255) UNIQUE,
    `password`  VARCHAR(255),
    `email`     VARCHAR(255)
);
EOQ
);
