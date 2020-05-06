<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Decorators\Env;
use Engine\Request;
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
     * @access public
     * @param Request $request
     * @param Error $exception
     */
    public static function handle(Request $request, Error $exception)
    {
        $debug = Env::get('debug');
        $data = Auth::user();

        $request->view = new View('exception.tpl', [
            'title' => $exception->getMessage(),
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'debug' => $debug,
            'trace' => $exception->getTrace(),
            'id' => $data['id'],
            'name' => $data['name'],
        ]);

    }

}
