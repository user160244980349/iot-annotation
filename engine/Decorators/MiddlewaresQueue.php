<?php

namespace Engine\Decorators;

use Engine\Request;
use Engine\ServiceBus;


/**
 * MiddlewaresQueue.php
 *
 * MiddlewaresQueue service decorator.
 */
class MiddlewaresQueue
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
