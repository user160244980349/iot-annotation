<?php

namespace Engine\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;
use Error;
use App\Models\User;


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
        $data = User::getById(Auth::authenticated());

        $request->view = new View("exception.php", [
            "id" => $data["id"],
            "name" => $data["name"],
            "code" => $exception->getCode(),
            "title" => $exception->getMessage(),
            "trace" => $exception->getTrace(),
            "message" => $exception->getMessage(),
        ]);
    }

}
