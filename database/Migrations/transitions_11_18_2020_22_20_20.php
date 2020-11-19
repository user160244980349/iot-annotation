<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\Decorators\Database;

/**
 * transitions_11_18_2020_22_20_20.php
 *
 * Migration for ...
 */
class transitions_11_18_2020_22_20_20 implements ITransaction
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