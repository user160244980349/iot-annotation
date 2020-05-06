<?php

namespace Engine;

/**
 * Route.php
 *
 * Class Route contains info about route.
 */
class Route
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
     * Request parameters.
     *
     * @access public
     * @var array
     */
    public $args;

    /**
     * Route constructor.
     *
     * @access public
     * @param string $name
     * @param array $controller
     * @param array $args
     */
    public function __construct(string $name, array $controller, array $args)
    {
        $this->name = $name;
        $this->controller = $controller;
        $this->args = $args;
    }

}
