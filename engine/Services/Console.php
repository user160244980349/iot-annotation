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
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'console';

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    private $_commands;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public function __construct()
    {
        $this->_commands = require_once ENV['commands'];
    }

    /**
     * Run command.
     *
     * @access public
     * @param array $args - Command prompt arguments
     * @return void
     */
    public function run(array $args): void
    {
        array_shift($args);
        $alias = $args[0];
        array_shift($args);

        foreach (static::$_commands as $command) {
            if ($command->test($alias)) {
                $command->execute($args);
            }
        }
    }

}
