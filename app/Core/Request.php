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
     * Request session.
     *
     * @var array.
     * @access public.
     */
    public $session;

    /**
     * Request constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->session = $_SESSION;

        if (empty($this->session)) {
            session_start();
        }

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

        $this->parameters['route'] = $_SERVER['REQUEST_URI'];
    }

    /**
     * Request destructor.
     *
     * @access public.
     */
    public function __destruct ()
    {
        $this->session = null;
        $this->method = null;
        $this->uri = null;
        $this->parameters = null;
    }

}
