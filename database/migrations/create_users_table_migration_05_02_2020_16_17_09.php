<?php

namespace Database\migrations;

use Engine\Entity\IMigration;
use Engine\Entity\ServiceBus;

class create_users_table_migration_05_02_2020_16_17_09 implements IMigration
{

    public static function up()
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `users` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255),
                `password`  VARCHAR(255),
                `email`     VARCHAR(255)
            )");
    }

    public static function drop()
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `users`");
    }

}