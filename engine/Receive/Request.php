<?php

namespace Engine\Receive;

use Engine\Routing\Route;
use Engine\Rendering\View;
use Closure;

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
    public array $parameters;

    /**
     * Route that will be executed.
     *
     * @access public
     * @var Route
     */
    public ?Route $route;

    /**
     * View that will be displayed.
     *
     * @access public
     * @var View
     */
    public ?View $view;

    /**
     * Post response job.
     *
     * @access public
     * @var Closure
     */
    public ?Closure $post_response;

    /**
     * Request constructor.
     *
     * @access public
     * @param array $parameters - To pass in controller
     * @param Route $route - Route to follow
     */
    public function __construct(array $parameters, Route $route = null)
    {
        $this->parameters = $parameters;
        $this->route = $route;
    }

}
