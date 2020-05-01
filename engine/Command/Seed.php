<?php

namespace Engine\Command;

use Engine\Entity\ServiceBus;

/**
 * Seed.php
 *
 * Command class to upload seeds.
 */
class Seed
{

    /**
     * Create tables.
     *
     * @access public.
     * @param string $name
     */
    public static function create(string $name)
    {
        $file = ServiceBus::get('fsmap')->get('seeds') . '/' . date('m-d-Y_H-i-s') . '_' . $name . '.php';
        $content =
<<<EOT
<?php

use Engine\Entity\ServiceBus;

ServiceBus::get('database')->query( /** query **/ );
EOT;

        print("creating migration...\n");
        file_put_contents($file, $content);
        print("migration was created.\n");
    }

    /**
     * Create tables.
     *
     * @access public.
     */
    public static function do()
    {
        print("uploading seeds...\n");

        $migrations = ServiceBus::get('fsmap')->get('seeds');
        foreach (scandir($migrations) as $filename) {
            $path = $migrations . '/' . $filename;
            if (is_file($path)) {
                require $path;
            }
        }

        print("seeds were uploaded.\n");
    }

}
