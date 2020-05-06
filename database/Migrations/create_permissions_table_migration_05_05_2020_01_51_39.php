<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\ServiceBus;

class create_permissions_table_migration_05_05_2020_01_51_39 implements ITransaction
{
    
    public static function commit()
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `permissions` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `for`       VARCHAR(255)
            )");
    }
    
    public static function revert()
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `permissions`");
    }

}