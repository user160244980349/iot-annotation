<?php

namespace Engine\Command;

use Engine\Entity\ServiceBus;

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
     * @param string $name
     */
    public static function create(string $name)
    {
        print("creating migration...\n");

        $path = ServiceBus::get('fsmap')->get('migrations');
        $date = date('m_d_Y_H_i_s');
        $name = "{$name}_migration";
        $file = "{$path}/{$name}_{$date}.php";
        $content =
/** @lang php */
<<<EOT
<?php

namespace Database\Migrations;

use Engine\Entity\IMigration;
use Engine\Entity\ServiceBus;

class {$name}_{$date} implements IMigration
{
    
    public static function up() 
    {
        /** query **/
    }
    
    public static function drop() 
    {
        /** query **/
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
    public static function do()
    {
        print("setting up migrations...\n");

        if (!self::check()) {
            self::init();
        }

        $response = ServiceBus::get('database')->fetch(
            "SELECT MAX(`iteration`) as `max` FROM `migrations`;");

        if (!isset($response['max']))
            $iteration = 0;
        else
            $iteration = $response['max'] + 1;

        $response = array_column(ServiceBus::get('database')->fetchAll(
            "SELECT DISTINCT `class` FROM `migrations`;"),
            'class');

        $migrations_list = ServiceBus::get('conf')->get('migrations_list');
        foreach ($migrations_list as $migration) {

            if (in_array($migration, $response)) {
                continue;
            }

            $migration::up();
            $escaped_migration = addslashes($migration);
            ServiceBus::get('database')->fetch(
                "INSERT INTO `migrations` (
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
     */
    private static function init()
    {
        print("creating migration table...\n");

        ServiceBus::get('database')->fetch(
            "CREATE TABLE `migrations` (
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
    public static function revert_all()
    {
        print("undoing migrations...\n");

        $migrations_list = ServiceBus::get('conf')->get('migrations_list');
        foreach (array_reverse($migrations_list) as $migration) {
            $migration::drop();
        }

        print("all migrations have been undone.\n");
    }

    /**
     * Create tables.
     *
     * @access public.
     * @return bool
     */
    private static function check()
    {
        print("checking if migration table exists...\n");

        $check = ServiceBus::get('database')->fetch(
            "SELECT `iteration` FROM `migrations`");
        return isset($check);
    }

}
