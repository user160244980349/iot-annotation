<?php

namespace Engine;

/**
 * Route.php
 *
 * Class Route contains info about route.
 */
class Command
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
    public $controller;

    /**
     * Route constructor.
     *
     * @access public
     * @param string $name
     * @param array $controller
     * @param array $args
     */
    public function __construct(string $name, 
                                array $controller)
    {
        $this->name = $name;
        $this->controller = $controller;
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

    /**
     * Route constructor.
     *
     * @access public
     * @param string $name
     * @param array $controller
     * @param array $args
     */
    public function execute($args)
    {
        forward_static_call($this->controller, ...$args);
    }
}
