<?php

namespace App\Object;

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
     * @var string.
     * @access public.
     */
    public $name;

    /**
     * Request parameters.
     *
     * @var array.
     * @access public.
     */
    public $controller;

    /**
     * Request parameters.
     *
     * @var array.
     * @access public.
     */
    public $args;

    /**
     * Route constructor.
     *
     * @param string $name.
     * @param array $controller.
     * @param array $args.
     * @access public.
     */
    public function __construct (string $name, array $controller, array $args) {
        $this->name = $name;
        $this->controller = $controller;
        $this->args = $args;
    }

}
