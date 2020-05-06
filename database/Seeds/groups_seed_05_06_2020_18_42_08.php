<?php

namespace Database\Seeds;

use Engine\Decorators\Database;
use Engine\ITransaction;

/**
 * groups_seed_05_06_2020_18_42_08.php
 *
 * Seeding for ...
 */
class groups_seed_05_06_2020_18_42_08 implements ITransaction
{

    /**
     * Performs seeding
     *
     */
    public static function commit()
    {
        Database::fetch("
            INSERT INTO `groups` (
                `name`
            ) VALUES
            ('authenticated')
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