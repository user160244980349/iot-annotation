<?php

namespace Database\Seeds;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

/**
 * users_05_06_2020_17_17_34.php
 *
 * Seeding for ...
 */
class users_05_06_2020_17_17_34 implements ITransaction
{

    /**
     * Performs seeding
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'INSERT INTO `users` (
                `name`,
                `email` 
            ) VALUES
            (\'Pete\', \'pete@box.com\'),
            (\'Bob\', \'bob@box.com\'),
            (\'Steve\', \'steve@box.com\'),
            (\'Maria\', \'maria@box.com\')'
        );
    }

    /**
     * Revert all seeds
     *
     */
    public static function revert()
    {
        /** nothing */
    }
}