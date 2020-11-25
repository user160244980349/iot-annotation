<?php

namespace Engine\Decorators;


/**
 * ServiceBus.php
 *
 * Decorator for service bus class.
 */
class ServiceBus
{

    /**
     * ServiceBus autoload services from config.
     *
     * @access public
     */
    public static function autoload(): void
    {
        \Engine\ServiceBus::instance()->autoload();
    }

    /**
     * Service getter.
     *
     * @access public
     * @param string $alias - Alias of service
     * @return object
     */
    public static function get(string $alias): object
    {
        return \Engine\ServiceBus::instance()->get($alias);
    }

    /**
     * Register new service with existing object.
     *
     * @access public
     * @param string $alias - Alias of service
     * @param $object - Existing object
     * @return void
     */
    public static function register(string $alias, $object): void
    {
        \Engine\ServiceBus::instance()->register($alias, $object);
    }

}
