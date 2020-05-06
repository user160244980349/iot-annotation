<?php

namespace App\Controllers;

use Engine\Request;
use Engine\ServiceBus;
use Engine\View;
use Error;

/**
 * ExceptionHandler.php
 *
 * Controller class to load exception pages.
 */
class ExceptionHandler
{

    /**
     * Go to n-exception page.
     *
     * @access public.
     * @param Request $request .
     * @param Error $exception
     */
    public static function handle(Request $request, Error $exception)
    {
        $debug = ServiceBus::get('env')->get('debug');
        $data = ServiceBus::get('auth')->user();

        $request->view = new View('exception.tpl', [
            'title' => $exception->getMessage(),
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'debug' => $debug,
            'trace' => $exception->getTrace(),
            'user_id' => $data['id'],
            'username' => $data['name'],
        ]);

    }

}
