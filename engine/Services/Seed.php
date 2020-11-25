<?php

namespace Engine\Services;

use Engine\Decorators\RawSQL;
use Engine\Env;
use Engine\ITransaction;

/**
 * Seed.php
 *
 * Command class to upload seeds.
 */
class Seed
{
    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'seed';

    /**
     * List of migrations.
     *
     * @access private
     */
    private $_seeds_list;

    /**
     * Static constructor.
     *
     * @access public
     */
    public function __construct()
    {
        $this->_seeds_list = require_once ENV['seeds'];
    }

    /**
     * Create seeds file.
     *
     * @access public
     * @param string $name - Seed`s name
     */
    public function create(string $name): void
    {

        $path = Env::get('seeds');
        $date = date("m_d_Y_H_i_s");
        $file = "{$path}/{$name}_{$date}.php";
        $content =
/** @lang php&sql */
<<<EOT
<?php

namespace Database\Seeds;

use Engine\ITransaction;
use Engine\Decorators\RawSQL;

/**
 * {$name}_{$date}.php
 *
 * Seeding for ...
 */
class {$name}_{$date} implements ITransaction
{
    
    /**
     * Performs seeding
     *
     */
    public static function commit() {
        RawSQL::fetch("SELECT * FROM `table`");
    }
    
    /**
     * Revert all seeds
     *
     */
    public static function revert() {
        RawSQL::fetch("SELECT * FROM `table`");
    }
}
EOT;

        file_put_contents($file, $content);
    }

    /**
     * Inserting seeds.
     *
     * @access public
     */
    public function do(): void
    {
        foreach (static::$_seeds_list as $seed) {
            if (!in_array(ITransaction::class, class_implements($seed))) {
                return;
            }

            $seed::commit();

            $error = RawSQL::error();
            if ($error[0] != "00000")
                dd($error);
        }
    }

}
