<?php

namespace Database\migrations;

use Engine\Entity\IMigration;
use Engine\Entity\ServiceBus;

class create_permissions_table_migration_05_05_2020_01_51_39 implements IMigration
{
    
    public static function up() 
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `permissions` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `for`       VARCHAR(255)
            )");
    }
    
    public static function drop() 
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `permissions`");
    }

}