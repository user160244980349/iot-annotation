<?php

namespace Engine\Decorators;

use Engine\ServiceBus;


/**
 * Console.php
 *
 * Console decorator.
 */
class Console
{

    /**
     * Run command.
     *
     * @access public
     * @param array $args - Command line arguments
     * @return void
     */
    public static function run(array $args): void
    {
        ServiceBus::instance()->get('console')->run($args);
    }

}
