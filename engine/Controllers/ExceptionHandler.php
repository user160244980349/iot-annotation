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
        $id = Auth::authenticated();

        $request->view = new View("exception.php", [
            "id" => $id,
            "code" => $exception->getCode(),
            "title" => "Code {$exception->getCode()}",
            "trace" => $exception->getTrace(),
            "message" => $exception->getMessage(),
        ]);

        if ($id) {
            $user = User::getById($id);
            $request->view->push("name", $user["name"]);
        }
    }

}
