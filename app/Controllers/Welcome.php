<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
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
