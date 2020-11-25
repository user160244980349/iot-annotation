<?php

namespace Engine\Decorators;

use Engine\ServiceBus;


/**
 * Application.php
 *
 * Decorator class for application.
 */
class Application
{

    /**
     * Application run method.
     *
     * @access public
     * @return void
     */
    public static function run(): void
    {
        ServiceBus::instance()->get('application')->run();
    }

}
