<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\Decorators\Database;

/**
 * data_projection_11_18_2020_22_20_47.php
 *
 * Migration for ...
 */
class data_projections_11_18_2020_22_20_47 implements ITransaction
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