<?php

namespace Engine\Commands;

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
     * Create tables.
     *
     * @access public.
     * @param string $name .
     */
    public static function create(string $name): void
    {
        print("creating migration...\n");

        $path = FSMap::get('migrations');
        $date = date('m_d_Y_H_i_s');
        $name = "{$name}_migration";
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
        Database::fetch("SELECT * FROM `table`");
    }
}
EOT;

        file_put_contents($file, $content);

        print("migration has been created.\n");
    }

    /**
     * Create tables.
     *
     * @access public.
     */
    public static function do(): void
    {
        print("setting up migrations...\n");

        if (!self::check()) {
            self::init();
        }

        $response = Database::fetch("
            SELECT MAX(`iteration`) as `max` FROM `migrations`;");

        if (!isset($response['max']))
            $iteration = 0;
        else
            $iteration = $response['max'] + 1;

        $response = array_column(Database::fetchAll("
            SELECT DISTINCT `class` FROM `migrations`;"), 'class');

        $migrations_list = Configuration::get('migrations_list');
        foreach ($migrations_list as $migration) {

            if (in_array($migration, $response)) {
                continue;
            }

            if (!in_array(ITransaction::class, class_implements($migration))) {
                return;
            }
            $migration::commit();

            $escaped_migration = addslashes($migration);
            Database::fetch("
                INSERT INTO `migrations` (
                    `class`,
                    `iteration`
                ) VALUE (
                    '{$escaped_migration}',
                    {$iteration}
                );");

        }

        print("migrations have been set up.\n");
    }

    /**
     * Create tables.
     *
     * @access public.
     * @return bool.
     */
    private static function check(): bool
    {
        print("checking if migration table exists...\n");

        $check = Database::fetch("
            SELECT `iteration` FROM `migrations`");
        return isset($check);
    }

    /**
     * Create tables.
     *
     * @access public.
     */
    private static function init(): void
    {
        print("creating migration table...\n");

        Database::fetch("
            CREATE TABLE `migrations` (
                `id`            INT PRIMARY KEY AUTO_INCREMENT,
                `class`         VARCHAR(255),
                `iteration`     INT,
                `timestamp`     DATETIME DEFAULT CURRENT_TIMESTAMP
            );");
    }

    /**
     * Drop tables.
     *
     * @access public.
     */
    public static function revert(): void
    {
        print("undoing migrations...\n");

        $iteration = Database::fetch("
            SELECT MAX(`iteration`) as `max` FROM `migrations`;");

        $migrations_list = Database::fetchAll("
            SELECT `class` FROM `migrations` WHERE `migrations`.`iteration` = {$iteration['max']} ORDER BY `id` DESC");
        $migrations_list = array_column($migrations_list, 'class');

        foreach ($migrations_list as $migration) {
            if (in_array(ITransaction::class, class_implements($migration))) {
                $migration::revert();
                $migration = addslashes($migration);
                Database::fetch("
                    DELETE FROM `migrations` WHERE `migrations`.`class` = '$migration'");
            }
        }

        print("all migrations have been undone.\n");
    }

    /**
     * Drop tables.
     *
     * @access public.
     */
    public static function revert_all(): void
    {
        print("undoing migrations...\n");

        $migrations_list = Database::fetchAll("
            SELECT `iteration` FROM `migrations` ORDER BY `id` DESC");
        $migrations_list = array_column($migrations_list, 'class');

        foreach (array_reverse($migrations_list) as $migration) {
            if (in_array(ITransaction::class, class_implements($migration))) {
                $migration::revert();
                $migration = addslashes($migration);
                Database::fetch("
                    DELETE FROM `migrations` WHERE `migrations`.`class` = '$migration'");
            }
        }

        print("all migrations have been undone.\n");
    }

}
