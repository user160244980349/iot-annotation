<?php

namespace Database\Migrations;

use Engine\Decorators\Database;
use Engine\ITransaction;

class create_users_table_migration_05_02_2020_16_17_09 implements ITransaction
{

    public static function commit()
    {
        Database::fetch(
            "CREATE TABLE `users` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255) UNIQUE,
                `password`  VARCHAR(255) NOT NULL,
                `email`     VARCHAR(255) UNIQUE NOT NULL
            )");
    }

    public static function revert()
    {
        Database::fetch(
            "DROP TABLE `users`");
    }

}