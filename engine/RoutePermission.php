<?php

namespace Engine;

/**
 * RoutePermission.php
 *
 * Class RoutePermission defines permissions for 
 * visiting and accepting responses on different routes.
 */
class RoutePermission
{

    /**
     * Name of related route.
     *
     * @access public
     * @var string
     */
    public $name;

    /**
     * Permissions list.
     *
     * @access public
     * @var array
     */
    public $permissions;

    /**
     * Permission constructor.
     *
     * @access public
     * @param string $name - Route name
     * @param array $permissions - Permission token
     */
    public function __construct(string $name, 
                                array $permissions)
    {
        $this->name = $name;
        $this->permissions = $permissions;
    }


    /**
     * Test if permissions for proper route.
     *
     * @access public
     * @param string $name - Route name.
     */
    public function test(string $name): bool
    {
        if ($this->name == $name) {
            return true;
        }
        return false;
    }

}
