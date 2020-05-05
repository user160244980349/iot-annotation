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
        print("creating seeds...\n");
        $path = ServiceBus::get('fsmap')->get('seeds');
        $date = date('m_d_Y_H_i_s');
        $name = "{$name}_seed";
        $file = "{$path}/{$date}_{$name}.php";
        $content =
            /** @lang php&sql */
            <<<EOT
<?php

namespace Database\Migration;

use Engine\Entity\Seed;
use Engine\Entity\ServiceBus;

class {$name}_{$date} extends Seed
{
    
    public static function do() {
        ServiceBus::get('database')->query(
<<<EOQ
SELECT * FROM `table`
EOQ
        );
    }
    
    public static function undo() {
        ServiceBus::get('database')->query(
<<<EOQ
SELECT * FROM `table`
EOQ
        );
    }

}
EOT;
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
