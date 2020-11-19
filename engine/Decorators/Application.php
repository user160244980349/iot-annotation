<?php

namespace Engine\Decorators;


/**
 * Application.php
 *
 * Main class for application.
 */
class Application
{

    /**
     * Application run method.
     *
     * @access public
     */
    public static function run(): void
    {
        ServiceBus::instance()->get('application')->run();
    }

}
