<?php

namespace Database\Migrations;

use Engine\Decorators\Database;
use Engine\ITransaction;

class permissions_05_05_2020_01_51_39 implements ITransaction
{

    public static function commit()
    {
        Database::fetch(
            "CREATE TABLE `permissions` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `for`       VARCHAR(255)
            )");
    }

    public static function revert()
    {
        Database::fetch(
            "DROP TABLE `permissions`");
    }

}