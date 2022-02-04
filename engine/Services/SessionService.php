<?php

namespace Engine\Services;

use Engine\Service;

/**
 * Session.php
 *
 * Service for sessions  management.
 */
class SessionService extends Service
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'session';

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
     * Sets session variable.
     *
     * @access public
     * @param string $name - Name of a variable
     * @param $value - Storing value
     */
    protected function set(string $name, $value): void
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Gives session variable.
     *
     * @access public
     * @param string $name - Name of a variable
     * @return mixed
     */
    protected function get(string $name)
    {
        if (array_key_exists($name, $_SESSION))
            return $_SESSION[$name];
        return null;
    }

    /**
     * Finishes request.
     *
     * @access public
     */
    protected function finish_request(): void
    {
        session_write_close();
        fastcgi_finish_request();
    }

    /**
     * Destroys session.
     *
     * @access public
     */
    protected function destroy(): void
    {
        session_destroy();
    }

}
