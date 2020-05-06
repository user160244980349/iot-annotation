<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\ServiceBus;

class create_users_table_migration_05_02_2020_16_17_09 implements ITransaction
{

    public static function commit()
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `users` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255),
                `password`  VARCHAR(255),
                `email`     VARCHAR(255)
            )");
    }

    public static function revert()
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `users`");
    }

}