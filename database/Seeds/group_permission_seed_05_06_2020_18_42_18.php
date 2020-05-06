<?php

namespace Database\Seeds;

use Engine\Decorators\Database;
use Engine\ITransaction;

/**
 * group_permission_seed_05_06_2020_18_42_18.php
 *
 * Seeding for ...
 */
class group_permission_seed_05_06_2020_18_42_18 implements ITransaction
{

    /**
     * Performs seeding
     *
     */
    public static function commit()
    {
        Database::fetch("
            INSERT INTO `group_permission` (
                `group_id`,
                `permission_id`
            ) VALUES
            (1, 1)
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