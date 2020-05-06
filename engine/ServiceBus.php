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
        if (!isset(self::$_instance)) {
            self::$_instance = new ServiceBus();
        }
        return self::$_instance;
    }

    /**
     * ServiceBus autoload services from config.
     *
     * @access public
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
     * @access public
     * @param string $alias
     * @return object
     */
    public function get(string $alias): object
    {
        if (!isset($this->_services[$alias]['object'])) {
            $this->_services[$alias]['object'] = new $this->_services[$alias]['class']();
        }
        return $this->_services[$alias]['object'];
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
            $this->_services[$alias]['class'] = get_class($object);
            $this->_services[$alias]['object'] = $object;
        }
    }

}
