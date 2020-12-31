<?php

namespace Engine\Packages\Routing;

/**
 * Route.php
 *
 * Class Route contains info about route.
 */
class Route
{

    /**
     * Route name.
     *
     * @access public
     * @var string
     */
    public $name;

    /**
     * Route pattern.
     *
     * @access public
     * @var string
     */
    public $pattern;

    /**
     * Request method.
     *
     * @access public
     * @var string
     */
    public $method;

    /**
     * Controller to execute.
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
     * @param string $name - Route name
     * @param string $method - HTTP method
     * @param string $patetrn - Pattern for url
     * @param array $controller - Controller to exec
     */
    public function __construct(string $name, 
                                string $method, 
                                string $pattern, 
                                array $controller)
    {
        $this->name = $name;
        $this->method = $method;
        $this->pattern = $pattern;
        $this->controller = $controller;
    }

    /**
     * Test route if it fits.
     *
     * @access public
     * @param string $name - Route name
     * @param string $method - HTTP method
     * @return bool
     */
    public function test(string $uri, string $method): bool
    {
        if ($this->method == $method &&
            preg_match($this->pattern, $uri, $params_matches)) {
            array_shift($params_matches);
            $this->args = $params_matches;
            return true;
        }
        return false;
    }

    /**
     * Route constructor.
     *
     * @access public
     * @param Request $request - Request object to response
     */
    public function execute($request)
    {
        forward_static_call($this->controller, $request, ...$this->args);
    }

}
