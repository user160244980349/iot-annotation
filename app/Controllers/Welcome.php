<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;
use App\Models\User;

/**
 * Welcome.php
 *
 * Controller class for welcome page.
 */
class Welcome
{

    /**
     * Goes to welcome page.
     *
     * @access public
     * @param Request $request
     */
    public static function toWelcomePage(Request $request)
    {
        $id = Auth::authenticated();

        $request->view = new View('welcome.php', [
            'id' => $id,
            'title' => 'Welcome',
        ]);

        if ($id) {
            $user = User::getById($id);
            $request->view->push('name', $user['name']);
        }
    }

}
