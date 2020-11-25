<?php

namespace Database\Migrations;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

class groups_05_05_2020_01_51_26 implements ITransaction
{
    
    /**
     * Performs migration
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'CREATE TABLE `groups` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255)
            )'
        );
    }

    /**
     * Revert migration
     *
     */
    public static function revert()
    {
        RawSQL::fetch('DROP TABLE `groups`');
    }

}