<?php

namespace Database\Seeds;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

/**
 * group_user_05_06_2020_18_42_20.php
 *
 * Seeding for ...
 */
class group_user_05_06_2020_18_42_20 implements ITransaction
{

    /**
     * Performs seeding
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'INSERT INTO `group_user` (
                `group_id`,
                `user_id`
            ) VALUES
            (1, 1),
            (2, 1),
            (1, 2),
            (1, 3),
            (1, 4)'
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