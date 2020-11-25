<?php

namespace Database\Migrations;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

class group_permission_05_05_2020_02_00_35 implements ITransaction
{

    /**
     * Performs migration
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'CREATE TABLE `group_permission` (
                `id`            INT PRIMARY KEY AUTO_INCREMENT,
                `group_id`      INT,
                `permission_id` INT,
                FOREIGN KEY (`group_id`)        REFERENCES `groups`(`id`),
                FOREIGN KEY (`permission_id`)   REFERENCES `permissions`(`id`)
            )'
        );
    }

    /**
     * Revert migration
     *
     */
    public static function revert()
    {
        RawSQL::fetch(
            "DROP TABLE `group_permission`");
    }

}