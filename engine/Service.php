<?php

namespace Engine;

use Engine\ServiceBus;

/**
 * ServiceFacade.php
 *
 * Decorator class for authentication.
 */
abstract class Service
{

    /**
     * Alias for service.
     *
     * @var string
     */
    static public string $alias;

    /**
     * Alias for service.
     *
     * @var string
     */
    public static function __callStatic($method, $args) {
        return call_user_func_array(
            [ServiceBus::instance()->get(static::$alias), $method], 
            $args
        );
    }
}
