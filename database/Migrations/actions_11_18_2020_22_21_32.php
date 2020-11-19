<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\Decorators\Database;

/**
 * actions_11_18_2020_22_21_32.php
 *
 * Migration for ...
 */
class actions_11_18_2020_22_21_32 implements ITransaction
{
    
    /**
     * Performs migration
     *
     */
    public static function commit() {
        Database::fetch("SELECT * FROM `table`");
    }
    
    /**
     * Revert migration
     *
     */
    public static function revert() {
        Database::fetch("DROP TABLE `table`");
    }
}