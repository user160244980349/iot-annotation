<?php

namespace App\Core;

use App\Core\Route;
/**
 * Request.php
 *
 * Class Request contains info about request.
 */
class Request
{
    /**
     * Request method.
     *
     * @var array.
     * @access public.
     */
    public $method;

    /**
     * Request parameters.
     *
     * @var array.
     * @access public.
     */
    public $parameters;

    /**
     * Route that will be executed.
     *
     * @var Route.
     * @access public.
     */
    public $route;

    /**
     * View that will be executed.
     *
     * @var View.
     * @access public.
     */
    public $view;

    /**
     * Route constructor.
     *
     * @access public.
     */
    public function __construct (string $method, array $parameters, Route $route = null) {
        $this->method = $method;
        $this->parameters = $parameters;
        $this->route = $route;
    }

}
