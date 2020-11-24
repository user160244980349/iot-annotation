<?php

namespace Engine;

/**
 * Route.php
 *
 * Class Route contains info about route.
 */
class RoutePermission
{

    /**
     * Request method.
     *
     * @access public
     * @var string
     */
    public $name;

    /**
     * Request parameters.
     *
     * @access public
     * @var array
     */
    public $permissions;

    /**
     * Route constructor.
     *
     * @access public
     * @param string $name
     * @param array $controller
     * @param array $args
     */
    public function __construct(string $name, 
                                array $permissions)
    {
        $this->name = $name;
        $this->permissions = $permissions;
    }


    /**
     * Route constructor.
     *
     * @access public
     * @param string $name
     * @param array $controller
     * @param array $args
     */
    public function test(string $name): bool
    {
        if ($this->name == $name) {
            return true;
        }
        return false;
    }

}
