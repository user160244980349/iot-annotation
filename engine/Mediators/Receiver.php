<?php

namespace Engine\Mediators;

use Engine\Request;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Receiver implements IMediator
{

    /**
     * Method providing mediator chain call.
     *
     * @param Request $null Null because not needed.
     * @return Request Initialized request object.
     * @access public.
     */
    public function let(Request $null = null): Request
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $parameters = $_GET;
            $parameters['method'] = 'get';
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $parameters = $_POST;
            $parameters['uri'] = $_GET['uri'];
            $parameters['method'] = 'post';
            if (isset($parameters['_method'])) {
                if ($parameters['_method'] == 'put') {
                    $parameters['method'] = 'put';
                } elseif ($parameters['_method'] == 'delete') {
                    $parameters['method'] = 'delete';
                }
            }
        }

        return new Request($parameters);
    }

}
