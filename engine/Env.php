<?php

namespace Engine;

/**
 * Env.php
 *
 * Static class for loading settings.
 */
class Env
{

    /**
     * Variables.
     *
     * @access private
     * @var array
     */
    private static $_variables;

    /**
     * Setter for variable.
     *
     * @access public
     * @param string $name - Variable name
     * @param mixed $value - Variables value
     * @return void
     */
    public static function set($value): void
    {
        static::$_variables = $value;
    }

    /**
     * Getter for variable.
     *
     * @access public
     * @param string $name - Variable name
     * @return mixed
     */
    public static function get(string $name)
    {
        return static::$_variables[$name];
    }

}
