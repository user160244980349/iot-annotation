<?php

namespace Engine;

/**
 * Request.php
 *
 * Class Request contains info about request.
 */
class Request
{

    /**
     * Request parameters.
     *
     * @access public
     * @var array
     */
    public $parameters;

    /**
     * Route that will be executed.
     *
     * @access public
     * @var Route
     */
    public $route;

    /**
     * View that will be displayed.
     *
     * @access public
     * @var View
     */
    public $view;

    /**
     * Route constructor.
     *
     * @access public
     * @param array $parameters
     * @param Route $route
     */
    public function __construct(array $parameters, Route $route = null)
    {
        $this->parameters = $parameters;
        $this->route = $route;
    }

}
