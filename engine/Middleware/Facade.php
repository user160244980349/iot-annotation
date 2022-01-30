<?php

namespace Engine\Middleware;

use Engine\Receive\Request;
use Engine\ServiceBus;

/**
 * MiddlewaresQueue.php
 *
 * MiddlewaresQueue service decorator.
 */
class Facade
{

    /**
     * Pushes new object to print.
     *
     * @access public
     * @return Request
     */
    public static function run(): Request
    {
        return ServiceBus::instance()->get('middlewares_queue')->run();
    }

}
