<?php

namespace Engine\Decorators;

/**
 * Route.php
 *
 * Class Route contains info about route.
 */
class ServiceBus
{

    /**
     * ServiceBus autoload services from ngn-config.
     *
     * @access public.
     */
    public static function autoload()
    {
        \Engine\ServiceBus::instance()->autoload();
    }

    /**
     * Service getter.
     *
     * @param string $alias .
     * @access public.
     */
    public static function get(string $alias)
    {
        return \Engine\ServiceBus::instance()->get($alias);
    }

    /**
     * ServiceBus instance getter.
     *
     * @access public.
     */
    public static function instance()
    {
        return \Engine\ServiceBus::instance();
    }

    /**
     * Register new service with existing object.
     *
     * @param string $alias .
     * @param $object .
     * @access public.
     */
    public static function register(string $alias, $object)
    {
        \Engine\ServiceBus::instance()->register($alias, $object);
    }

}
