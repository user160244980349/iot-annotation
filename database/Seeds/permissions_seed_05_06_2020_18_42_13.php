<?php

namespace Database\Seeds;

use Engine\Decorators\Database;
use Engine\ITransaction;

/**
 * permissions_seed_05_06_2020_18_42_13.php
 *
 * Seeding for ...
 */
class permissions_seed_05_06_2020_18_42_13 implements ITransaction
{

    /**
     * Performs seeding
     *
     */
    public static function commit()
    {
        Database::fetch("
            INSERT INTO `permissions` (
                `for`
            ) VALUES
            ('visit-home')
        ");
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