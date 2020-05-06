<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\Decorators\Database;

/**
 * tutu_migration_05_06_2020_22_10_09.php
 *
 * Migration for ...
 */
class tutu_migration_05_06_2020_22_10_09 implements ITransaction
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
        Database::fetch("SELECT * FROM `table`");
    }
}