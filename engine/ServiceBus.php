<?php

namespace Engine;

use Engine\Decorators\Configuration;

/**
 * ServiceBus.php
 *
 * Class ServiceBus contains all services to use.
 */
class ServiceBus
{

    /**
     * ServiceBus instance.
     *
     * @access private
     * @var ServiceBus
     */
    private static $_instance;

    /**
     * ServiceBus array.
     *
     * @access private
     * @var array
     */
    private $_services;

    /**
     * ServiceBus instance getter.
     *
     * @access public
     */
    public static function instance()
    {
        if (!isset(static::$_instance)) {
            static::$_instance = new ServiceBus();
        }
        return static::$_instance;
    }

    /**
     * ServiceBus autoload services from config.
     *
     * @access public
     */
    public function autoload()
    {
        $service_classes = Configuration::get('services');
        foreach ($service_classes as $service_class) {
            $this->_services[$service_class::$alias] = [$service_class, null];
        }
    }

    /**
     * Service getter.
     *
     * @access public
     * @param string $alias
     * @return object
     */
    public function get(string $alias): object
    {
        if (!isset($this->_services[$alias][1])) {
            $this->_services[$alias][1] = new $this->_services[$alias][0]();
        }
        return $this->_services[$alias][1];
    }

    /**
     * Register new service with existing object.
     *
     * @access public
     * @param string $alias
     * @param object $object
     */
    public function register(string $alias, $object)
    {
        if (!isset($this->_services[$alias])) {
            $this->_services[$alias][0] = get_class($object);
            $this->_services[$alias][1] = $object;
        }
    }

}
