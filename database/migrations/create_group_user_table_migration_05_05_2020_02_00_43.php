<?php

namespace Database\migrations;

use Engine\Entity\IMigration;
use Engine\Entity\ServiceBus;

class create_group_user_table_migration_05_05_2020_02_00_43 implements IMigration
{
    
    public static function up() 
    {
        ServiceBus::get('database')->fetch(
            "CREATE TABLE `group_user` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `group_id`  INT,
                `user_id`   INT,
                FOREIGN KEY (`group_id`)    REFERENCES `groups`(`id`),
                FOREIGN KEY (`user_id`)     REFERENCES `permissions`(`id`)
            )");
    }
    
    public static function drop() 
    {
        ServiceBus::get('database')->fetch(
            "DROP TABLE `group_user`");
    }

}