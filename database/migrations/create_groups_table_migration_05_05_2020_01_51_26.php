<?php

namespace Database\migrations;

use Engine\Entity\IMigration;
use Engine\Entity\ServiceBus;

class create_groups_table_migration_05_05_2020_01_51_26 implements IMigration
{
    
    public static function up() 
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `groups` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255)
            )");
    }
    
    public static function drop() 
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `groups`");
    }

}