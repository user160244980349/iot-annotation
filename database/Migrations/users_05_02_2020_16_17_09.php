<?php

namespace Database\Migrations;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

class users_05_02_2020_16_17_09 implements ITransaction
{

    /**
     * Performs migration
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'CREATE TABLE `users` (
                `id`        INT PRIMARY KEY AUTO_INCREMENT,
                `name`      VARCHAR(255) UNIQUE,
                `email`     VARCHAR(255) UNIQUE NOT NULL
            )');
    }

    /**
     * Revert migration
     *
     */
    public static function revert()
    {
        RawSQL::fetch('DROP TABLE `users`');
    }

}