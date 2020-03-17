<?php

namespace App\Core;

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
     * Request constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        if ($this->method == 'GET') {
            $this->parameters = $_GET;
        } elseif ($this->method == 'POST') {
            $this->parameters = $_POST;
            if (isset($this->parameters['_method'])) {
                if ($this->parameters['_method'] == 'put') {
                    $this->method = 'PUT';
                } elseif ($this->parameters['_method'] == 'delete') {
                    $this->method = 'DELETE';
                }
            }
        }
    }

}
