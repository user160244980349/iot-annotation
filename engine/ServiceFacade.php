<?php

namespace Engine;

use Engine\ServiceBus;
use Engine\ServiceFacade;

/**
 * ServiceFacade.php
 *
 * Decorator class for authentication.
 */
class ServiceFacade
{
    public static $alias;

    public static function __callStatic($method, $args) {
        return call_user_func_array(
            [ServiceBus::instance()->get(static::$alias), $method], 
            $args
        );
    }
}
