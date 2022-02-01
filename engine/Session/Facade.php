<?php

namespace Engine\Session;

use Engine\ServiceBus;

/**
 * Session.php
 *
 * Decorator for sessions service.
 */
class Facade
{

    /**
     * Sets session variable.
     *
     * @access public
     * @param string $name - Variable name
     * @param $value - Variable value
     * @return void
     */
    public static function set(string $name, $value): void
    {
        ServiceBus::instance()->get('session')->set($name, $value);
    }

    /**
     * Gives session variable.
     *
     * @param string $name - Name of variable to get
     * @access public
     * @return mixed
     */
    public static function get(string $name)
    {
        return ServiceBus::instance()->get('session')->get($name);
    }

    /**
     * Finishes request.
     *
     * @access public
     * @return void
     */
    public static function finish_request(): void
    {
        ServiceBus::instance()->get('session')->finish_request();
    }

    /**
     * Destroys session.
     *
     * @access public
     * @return void
     */
    public static function destroy(): void
    {
        ServiceBus::instance()->get('session')->destroy();
    }

}
