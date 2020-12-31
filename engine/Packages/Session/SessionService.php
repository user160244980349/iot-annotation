<?php

namespace Engine\Packages\Session;

/**
 * Session.php
 *
 * Service for sessions  management.
 */
class SessionService
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'session';

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
    public function set(string $name, $value): void
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
    public function get(string $name)
    {
        if (array_key_exists($name, $_SESSION))
            return $_SESSION[$name];
        return null;
    }

    /**
     * Destroys session.
     *
     * @access public
     */
    public function destroy(): void
    {
        session_destroy();
    }

    /**
     * Destroys session.
     *
     * @access public
     */
    public function clearAll() 
    {
        static::_rrmdir(session_save_path());
    }

    /**
     * Recursively removes directory content.
     *
     * @access private
     * @param $directory - Directory to delete
     * @param null $delete_parent - Recursive argument
     */
    private static function _rrmdir($directory, $delete_parent = null): void
    {
        static::_rrmdir(session_save_path());
        $files = glob($directory . "/{,.}[!.,!..]*", GLOB_MARK | GLOB_BRACE);
        foreach ($files as $file) {
            if (is_dir($file)) {
                static::_rrmdir($file, 1);
            } else {
                unlink($file);
            }
        }
        if ($delete_parent) {
            rmdir($directory);
        }
    }

}
