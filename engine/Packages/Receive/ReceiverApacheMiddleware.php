<?php

namespace Engine\Packages\Receive;

use Engine\Packages\Middleware\Bundled\IMiddleware;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class ReceiverApacheMiddleware implements IMiddleware
{

    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $null - Null because not needed
     * @return Request - Initialized request object
     */
    public function let(?Request $request): Request
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
