<?php

namespace Engine\Entity;

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
     * @param array $parameters .
     * @param Route $route .
     * @access public.
     */
    public function __construct(array $parameters, Route $route = null)
    {
        $this->parameters = $parameters;
        $this->route = $route;
    }

}
