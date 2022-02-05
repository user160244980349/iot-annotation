<?php

namespace Engine;

use Engine\Config;

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
    private static ServiceBus $_instance;

    /**
     * ServiceBus array.
     *
     * @access private
     * @var array
     */
    private array $_services;

    /**
     * ServiceBus services registration.
     *
     * @return ServiceBus
     */
    public function __construct()
    {
        $services = Config::get('services');

        foreach ($services as $service) {
            $this->_services[$service::$alias] = [$service, null];
        }
    }

    /**
     * ServiceBus instance getter.
     *
     * @return ServiceBus
     */
    public static function instance(): ServiceBus
    {
        if (!isset(static::$_instance)) {
            static::$_instance = new ServiceBus();
        }
        return static::$_instance;
    }

    /**
     * Service getter.
     *
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

}
