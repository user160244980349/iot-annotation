<?php

namespace Engine;

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
    private static $_services;

    /**
     * ServiceBus array.
     *
     * @access private
     * @var array
     */
    private $_service_instances;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public static function register(array $services): void
    {
        static::$_services = $services;
    }

    /**
     * ServiceBus instance getter.
     *
     * @access public
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
     * ServiceBus autoload services from config.
     *
     * @access public
     * @return void
     */
    public function autoload(): void
    {
        foreach (static::$_services as $service_class) {
            $this->_service_instances[$service_class::$alias] = [$service_class, null];
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
        if (!isset($this->_service_instances[$alias][1])) {
            $this->_service_instances[$alias][1] = new $this->_service_instances[$alias][0]();
        }

        return $this->_service_instances[$alias][1];
    }

}
