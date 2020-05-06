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
     * Set session variable.
     *
     * @param string $name .
     * @param $value .
     * @access public.
     */
    public static function set(string $name, $value)
    {
        return ServiceBus::instance()->get('session')->set($name, $value);
    }

    /**
     * Get session variable.
     *
     * @param string $name .
     * @access public.
     */
    public static function get(string $name)
    {
        return ServiceBus::instance()->get('session')->get($name);
    }

    /**
     * Destroy session.
     *
     * @access public.
     */
    public static function destroy()
    {
        return ServiceBus::instance()->get('session')->destroy();
    }

}
