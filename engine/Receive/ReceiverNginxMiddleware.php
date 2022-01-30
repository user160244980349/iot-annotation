<?php

namespace Engine\Receive;

use Engine\Middleware\Bundled\IMiddleware;

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
        $parameters['uri'] = ltrim($_SERVER['REQUEST_URI'], '/');
        $parameters['files'] = $_FILES;

        switch ($_SERVER['REQUEST_METHOD']) {

            case 'GET':
                $parameters = array_merge($parameters, $_GET);
                $parameters['method'] = 'get';
                break;

            case 'POST':
                $parameters = array_merge($parameters, $_POST);
    
                if (isset($parameters['_method'])) {
                    $parameters['method'] = $parameters['_method'];
                } else {
                    $parameters['method'] = 'post';
                }
                break;

        }

        return new Request($parameters);
    }

}
