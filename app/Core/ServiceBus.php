<?php

namespace App\Core;

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
     * ServiceBus instance getter.
     *
     * @access public.
     */
    public static function instance () {
        if (!isset(self::$_instance)) {
            self::$_instance = new ServiceBus();
        }
        return self::$_instance;
    }

    /**
     * ServiceBus constructor.
     *
     * @access public.
     */
    public static function autoload () {
        return self::instance()->autoloadd();
    }

    /**
     * ServiceBus constructor.
     *
     * @access public.
     */
    public static function register (string $alias, $object) {
        return self::instance()->registerd($alias, $object);
    }

    /**
     * ServiceBus constructor.
     *
     * @access public.
     */
    public static function get (string $alias) {
        return self::instance()->getd($alias);
    }

    /**
     * ServiceBus constructor.
     *
     * @access public.
     */
    public function autoloadd () {
        $service_classes = self::$_instance->get('conf')->get('services');
        foreach ($service_classes as $alias => $service_class) {
            $this->_services[$alias] = ['class' => $service_class, 'object' => null];
        }
    }

    /**
     * ServiceBus constructor.
     *
     * @access public.
     */
    public function registerd (string $alias, $object) {
        if (!isset($this->_services[$alias])) {
            $this->_services[$alias]['class'] = get_class($object);
            $this->_services[$alias]['object'] = $object;
        }
    }

    /**
     * ServiceBus constructor.
     *
     * @access public.
     */
    public function getd (string $alias) {
        if (!isset($this->_services[$alias]['object'])) {
            $this->_services[$alias]['object'] = new $this->_services[$alias]['class']();
        }
        return $this->_services[$alias]['object'];
    }

}
