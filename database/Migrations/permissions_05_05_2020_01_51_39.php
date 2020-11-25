<?php

namespace Database\Migrations;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

class permissions_05_05_2020_01_51_39 implements ITransaction
{

    /**
     * Performs migration
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'CREATE TABLE `permissions` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `for`       VARCHAR(255)
            )'
        );
    }

    /**
     * Revert migration
     *
     */
    public static function revert()
    {
        RawSQL::fetch('DROP TABLE `permissions`');
    }

}