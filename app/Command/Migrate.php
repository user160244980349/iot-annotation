<?php

namespace App\Command;

use App\Object\ServiceBus;

/**
 * Migrate.php
 *
 * Command class to deploy database.
 */
class Migrate
{

    /**
     * Create tables.
     *
     * @access public.
     */
    public static function create (string $name)
    {
        $file = ServiceBus::get('fsmap')->get('migrations') . '/' . date('m-d-Y_H-i-s') . '_' . $name . '.php';
        $content =
"<?php

use App\Object\ServiceBus;

ServiceBus::get('database')->query( /** query **/ );

";

        print("creating migration...\n");
        file_put_contents($file, $content);
        print("migration was created.\n");
    }

    /**
     * Create tables.
     *
     * @access public.
     */
    public static function do ()
    {
        print("creating tables...\n");

        $migrations = ServiceBus::get('fsmap')->get('migrations');
        foreach (scandir($migrations) as $filename) {
            $path = $migrations . '/' . $filename;
            if (is_file($path)) {
                require $path;
            }
        }

        print("tables were created.\n");
    }

    /**
     * Drop tables.
     *
     * @access public.
     */
    public static function undo ()
    {
        print("dropping tables...\n");

        print("tables were droped.\n");
    }

}
