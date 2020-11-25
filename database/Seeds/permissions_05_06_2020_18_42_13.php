<?php

namespace Database\Seeds;

use Engine\Decorators\RawSQL;
use Engine\ITransaction;

/**
 * permissions_05_06_2020_18_42_13.php
 *
 * Seeding for ...
 */
class permissions_05_06_2020_18_42_13 implements ITransaction
{

    /**
     * Performs seeding
     *
     */
    public static function commit()
    {
        RawSQL::fetch(
            'INSERT INTO `permissions` (
                `for`
            ) VALUES
            (\'visit-home\'),
            (\'manage-bp\'),
            (\'manage-groups\'),
            (\'manage-products\')'
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