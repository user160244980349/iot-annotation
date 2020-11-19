<?php

namespace Database\Migrations;

use Engine\Decorators\Database;
use Engine\ITransaction;

class users_05_02_2020_16_17_09 implements ITransaction
{

    public static function commit()
    {
        Database::fetch(
            "CREATE TABLE `users` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255) UNIQUE,
                `email`     VARCHAR(255) UNIQUE NOT NULL
            )");
    }

    public static function revert()
    {
        Database::fetch(
            "DROP TABLE `users`");
    }

}