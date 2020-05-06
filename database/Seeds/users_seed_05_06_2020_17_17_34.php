<?php

namespace Database\Seeds;

use Engine\Decorators\Database;
use Engine\ITransaction;

/**
 * users_seed_05_06_2020_17_17_34.php
 *
 * Seeding for ...
 */
class users_seed_05_06_2020_17_17_34 implements ITransaction
{
    
    /**
     * Performs seeding
     *
     */
    public static function commit() {
        Database::fetch("
            INSERT INTO `users` (
                `name`,
                `password`,
                `email` 
            ) VALUES
            ('Pete', md5(md5('123')), 'pete@box.com'),
            ('Bob', md5(md5('123')), 'bob@box.com'),
            ('Steve', md5(md5('123')), 'steve@box.com'),
            ('Maria', md5(md5('123')), 'maria@box.com')
        ");
    }
    
    /**
     * Revert all seeds
     *
     */
    public static function revert() {
        /** nothing */
    }
}