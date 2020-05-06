<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\ServiceBus;

class create_group_permission_table_migration_05_05_2020_02_00_35 implements ITransaction
{
    
    public static function commit()
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `group_permission` (
                `id`            INT PRIMARY KEY AUTO_INCREMENT,
                `group_id`      INT,
                `permission_id` INT,
                FOREIGN KEY (`group_id`)        REFERENCES `groups`(`id`),
                FOREIGN KEY (`permission_id`)   REFERENCES `permissions`(`id`)
            )");
    }
    
    public static function revert()
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `group_permission`");
    }

}