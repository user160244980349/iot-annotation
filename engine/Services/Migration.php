<?php

namespace Engine\Services;

use Engine\Decorators\Seed;
use Engine\Decorators\RawSQL;
use Engine\Env;
use Engine\ITransaction;

/**
 * Migration.php
 *
 * Command class to deploy RawSQL schemes.
 */
class Migration
{
    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'migration';

    /**
     * List of migrations.
     *
     * @access private
     */
    private $_migrations_list;

    /**
     * Static constructor.
     *
     * @access public
     */
    public function __construct()
    {
        $this->_migrations_list = require_once ENV['migrations'];
    }

    /**
     * Create tables.
     *
     * @access public
     * @param string $name - Migration`s name
     */
    public function create(string $name): void
    {

        $path = Env::get('migrations');
        $date = date('m_d_Y_H_i_s');
        $file = "{$path}/{$name}_{$date}.php";
        $content =
/** @lang php */
<<<EOT
<?php

namespace Database\Migrations;

use Engine\ITransaction;
use Engine\Decorators\RawSQL;

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
        RawSQL::fetch(
            "CREATE TABLE `$name` (
                `id` INT PRIMARY KEY AUTO_INCREMENT
            )");
    }
    
    /**
     * Revert migration
     *
     */
    public static function revert() {
        RawSQL::fetch("DROP TABLE `$name`");
    }
}
EOT;

        file_put_contents($file, $content);
    }

    /**
     * Creates tables.
     *
     * @access public
     */
    public function do(): void
    {
        foreach (static::$_migrations_list as $migration) {
            if (in_array(ITransaction::class, class_implements($migration))) {
                $migration::commit();
            }
        }
    }

    /**
     * Drops tables.
     *
     * @access public
     */
    public function undo(): void
    {
        RawSQL::fetch('SET foreign_key_checks = 0');
        foreach (static::$_migrations_list as $migration) {
            if (in_array(ITransaction::class, class_implements($migration))) {
                $migration::revert();
            }
        }
        RawSQL::fetch('SET foreign_key_checks = 1');
    }

    /**
     * Drops tables and up them again with seeding.
     *
     * @access public
     */
    public function reset(): void
    {
        $this->undo();
        $this->do();
        Seed::do();
    }
    
}