<?php

namespace Engine\Decorators;

use Engine\Decorators\ServiceBus;

/**
 * Console.php
 *
 * Provides console interface for application.
 */
class Console
{

    /**
     * Run command.
     *
     * @access public
     * @param array $args
     */
    public static function run(array $args): void
    {
        ServiceBus::instance()->get('console')->run($args);
    }

}
