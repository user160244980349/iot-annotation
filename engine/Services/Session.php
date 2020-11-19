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
     * @access public
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Set session variable.
     *
     * @access public
     * @param string $name
     * @param $value
     */
    public function set(string $name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Get session variable.
     *
     * @access public
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        if (array_key_exists($name, $_SESSION))
            return $_SESSION[$name];
        return null;
    }

    /**
     * Destroy session.
     *
     * @access public
     */
    public function destroy(): void
    {
        session_destroy();
    }

}
