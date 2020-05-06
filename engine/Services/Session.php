<?php

namespace Engine\Services;

/**
 * Session.php
 *
 * Service for manage sessions.
 */
class Session
{

    /**
     * Constructor of service class.
     *
     * @access public.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Set session variable.
     *
     * @param string $name .
     * @param $value .
     * @access public.
     */
    public function set(string $name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Get session variable.
     *
     * @param string $name .
     * @access public.
     */
    public function get(string $name)
    {
        return $_SESSION[$name];
    }

    /**
     * Destroy session.
     *
     * @access public.
     */
    public function destroy()
    {
        session_destroy();
    }

}
