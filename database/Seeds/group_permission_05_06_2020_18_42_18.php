<?php

namespace Database\Seeds;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

/**
 * group_permission_05_06_2020_18_42_18.php
 *
 * Seeding for ...
 */
class group_permission_05_06_2020_18_42_18 implements ITransaction
{

    /**
     * Performs seeding
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'INSERT INTO `group_permission` (
                `group_id`,
                `permission_id`
            ) VALUES
            (1, 1),
            (2, 2),
            (2, 3),
            (2, 4)'
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