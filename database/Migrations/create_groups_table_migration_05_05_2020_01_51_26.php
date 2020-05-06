<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\ServiceBus;

class create_groups_table_migration_05_05_2020_01_51_26 implements ITransaction
{
    
    public static function commit()
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `groups` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255)
            )");
    }
    
    public static function revert()
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `groups`");
    }

}