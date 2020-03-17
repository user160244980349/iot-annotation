<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Middleware\MiddlewareInterface;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Receiver implements MiddlewareInterface
{
    /**
     * StageInterface method.
     *
     * @param Request $null Null because not needed.
     * @return Request Initialized request object.
     * @access public.
     */
    public function let (Request $null = null) : Request
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $method = 'get';
            $parameters = $_GET;
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $method = 'post';
            $parameters = $_POST;
            if (isset($parameters['_method'])) {
                if ($parameters['_method'] == 'put') {
                    $method = 'put';
                } elseif ($parameters['_method'] == 'delete') {
                    $method = 'delete';
                }
            }
        }

        return new Request($method, $parameters);
    }

}
