<?php

namespace Engine\Packages\Receive;

use Engine\Packages\Middleware\Bundled\IMiddleware;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class ReceiverNginxMiddleware implements IMiddleware
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

        switch ($_SERVER['REQUEST_METHOD']) {

            case 'GET':
                $parameters = $_GET;
                $parameters['uri'] = ltrim($_SERVER['REQUEST_URI'], '/');
                $parameters['method'] = 'get';
                break;

            case 'POST':
                $parameters = $_POST;
                $parameters['uri'] = $_SERVER['REQUEST_URI'];
    
                if (isset($parameters['_method'])) {

                    switch ($parameters['_method']) {
                        
                        case 'put':
                            $parameters['method'] = 'put';
                            break;

                        case 'delete':
                            $parameters['method'] = 'delete';
                            break;

                    }
                } else {
                    $parameters['method'] = 'post';
                }
                break;

        }

        return new Request($parameters);
    }

}
