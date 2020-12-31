<?php

namespace Engine\Packages\Middleware;

use Engine\Packages\Receive\Request;
use Engine\Packages\ServiceBus;

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
