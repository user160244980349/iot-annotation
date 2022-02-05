<?php

namespace Engine;

/**
 * Request.php
 *
 * Class Request contains info about request.
 */
class Config
{

    /**
     * Request parameters.
     *
     * @var array
     */
    private static array $_values = [];

    /**
     * Request constructor.
     *
     * @param array $parameters - To pass in controller
     * @param Route $route - Route to follow
     */
    public static function set(string $key, $value)
    {
        static::$_values[$key] = $value;
    }

    /**
     * Request constructor.
     *
     * @param array $parameters - To pass in controller
     * @param Route $route - Route to follow
     */
    public static function unset(string $key)
    {
        unset(static::$_values[$key]);
    }

    /**
     * Request constructor.
     *
     * @param array $parameters - To pass in controller
     * @param Route $route - Route to follow
     */
    public static function get(string $key)
    {
        return static::$_values[$key];
    }

}
