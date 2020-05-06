<?php

namespace Engine;

use Engine\Decorators\Configuration;

/**
 * Route.php
 *
 * Class Route contains info about route.
 */
class ServiceBus
{

    /**
     * ServiceBus instance.
     *
     * @var ServiceBus.
     * @access private.
     */
    private static $_instance;

    /**
     * ServiceBus array.
     *
     * @var array.
     * @access private.
     */
    private $_services;

    /**
     * ServiceBus autoload services from ngn-config.
     *
     * @access public.
     */
    public function autoload()
    {
        $service_classes = Configuration::get('services');
        foreach ($service_classes as $alias => $service_class) {
            $this->_services[$alias] = ['class' => $service_class, 'object' => null];
        }
    }

    /**
     * Service getter.
     *
     * @param string $alias .
     * @access public.
     */
    public function get(string $alias)
    {
        if (!isset($this->_services[$alias]['object'])) {
            $this->_services[$alias]['object'] = new $this->_services[$alias]['class']();
        }
        return $this->_services[$alias]['object'];
    }

    /**
     * ServiceBus instance getter.
     *
     * @access public.
     */
    public static function instance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new ServiceBus();
        }
        return self::$_instance;
    }

    /**
     * Register new service with existing object.
     *
     * @param string $alias .
     * @param $object .
     * @access public.
     */
    public function register(string $alias, $object)
    {
        if (!isset($this->_services[$alias])) {
            $this->_services[$alias]['class'] = get_class($object);
            $this->_services[$alias]['object'] = $object;
        }
    }

}
