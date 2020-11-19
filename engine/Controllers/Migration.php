<?php

namespace Engine\Controllers;

use Engine\Controllers\Seed;
use Engine\Decorators\Configuration;
use Engine\Decorators\Database;
use Engine\Decorators\FSMap;
use Engine\ITransaction;

/**
 * Migration.php
 *
 * Command class to deploy database subjects.
 */
class Migration
{
    /**
     * List of migrations.
     *
     * @access private
     */
    private static $_migrations_list = null;


    /**
     * Static constructor.
     *
     * @access public
     */
    public static function __constructStatic()
    {
        static::$_migrations_list = Configuration::get("migrations_list");
    }

    /**
     * Create tables.
     *
     * @access public
     * @param string $name
     */
    public static function create(string $name): void
    {
        print("creating migration...\n");

        $path = FSMap::get("migrations");
        $date = date("m_d_Y_H_i_s");
        $file = "{$path}/{$name}_{$date}.php";
        $content =
/** @lang php */
<<<EOT
<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\Decorators\Database;

/**
 * {$name}_{$date}.php
 *
 * Migration for ...
 */
class {$name}_{$date} implements ITransaction
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
EOT;

        file_put_contents($file, $content);

        print("migration has been created.\n");
    }

    /**
     * Create tables.
     *
     * @access public
     */
    public static function do(): void
    {
        print("setting up migrations...\n");

        foreach (static::$_migrations_list as $migration) {
            if (in_array(ITransaction::class, class_implements($migration))) {
                $migration::commit();
            }
        }

        print("migrations have been set up.\n");
    }

    /**
     * Drop tables.
     *
     * @access public
     */
    public static function undo(): void
    {
        print("reverting migrations...\n");
        
        Database::fetch('SET foreign_key_checks = 0');
        foreach (static::$_migrations_list as $migration) {
            if (in_array(ITransaction::class, class_implements($migration))) {
                $migration::revert();
            }
        }
        Database::fetch('SET foreign_key_checks = 1');

        print("all migrations have been reverted.\n");
    }

    /**
     * Drop tables.
     *
     * @access public
     */
    public static function reset(): void
    {
        print("resetting migrations...\n");
        
        static::undo();
        static::do();
        Seed::do();

        print("all migrations have been reset.\n");
    }
    
}

# Call static fields initialization
Migration::__constructStatic();