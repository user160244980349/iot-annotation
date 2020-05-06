<?php

namespace Database\Migrations;

use Engine\Decorators\Database;
use Engine\ITransaction;

class create_groups_table_migration_05_05_2020_01_51_26 implements ITransaction
{

    public static function commit()
    {
        Database::fetch(
            "CREATE TABLE `groups` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255)
            )");
    }

    public static function revert()
    {
        Database::fetch(
            "DROP TABLE `groups`");
    }

}