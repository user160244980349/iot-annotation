<?php

namespace Database\Seeds;

use Engine\ITransaction;
use Engine\Decorators\RawSQL;

/**
 * passwords_11_19_2020_04_11_24.php
 *
 * Seeding for ...
 */
class passwords_11_19_2020_04_11_24 implements ITransaction
{
    
    /**
     * Performs seeding
     *
     */
    public static function commit() {
        RawSQL::fetch(
            "INSERT INTO `passwords` (
                `id`, `value`
            ) VALUES
            (1, {md5(md5('123'))}),
            (2, {md5(md5('123'))}),
            (3, {md5(md5('123'))}),
            (4, {md5(md5('123'))})"
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