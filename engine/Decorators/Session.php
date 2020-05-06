<?php

namespace Engine\Decorators;

use Engine\ServiceBus;

/**
 * Session.php
 *
 * Service for manage sessions.
 */
class Session
{

    /**
     * Sets session variable.
     *
     * @param string $name .
     * @param $value .
     * @access public.
     */
    public static function set(string $name, $value): void
    {
        ServiceBus::instance()->get('session')->set($name, $value);
    }

    /**
     * Gives session variable.
     *
     * @param string $name .
     * @access public.
     * @return mixed.
     */
    public static function get(string $name)
    {
        return ServiceBus::instance()->get('session')->get($name);
    }

    /**
     * Destroys session.
     *
     * @access public.
     */
    public static function destroy(): void
    {
        ServiceBus::instance()->get('session')->destroy();
    }

}
