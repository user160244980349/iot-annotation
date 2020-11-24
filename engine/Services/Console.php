<?php

namespace Engine\Services;

use Engine\Decorators\Configuration;

/**
 * Console.php
 *
 * Provides console interface for application.
 */
class Console
{
    /**
     * Application run method.
     *
     * @var public
     */
    static public $alias = "console";

    /**
     * Run command.
     *
     * @access public
     * @param array $args
     */
    public function run(array $args): void
    {
        $commands = Configuration::get('console');
        array_shift($args);
        $alias = $args[0];
        array_shift($args);

        foreach ($commands as $command) {
            if ($command->test($alias)) {
                $command->execute($args);
            }
        }
    }

}
