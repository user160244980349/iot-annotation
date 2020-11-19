<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;
use App\Models\User;

/**
 * Welcome.php
 *
 * Controller class for loading welcome page.
 */
class Welcome
{

    /**
     * Go to welcome page.
     *
     * @access public
     * @param Request $request
     */
    public static function toWelcomePage(Request $request)
    {
        $id = Auth::authenticated();

        if ($id) {
            $user = User::getById($id);
            $request->view = new View('welcome.php', [
                'title' => 'Welcome',
                'id' => $id,
                'name' => $user['name'],
            ]);
        }

        $request->view = new View('welcome.php', [
            'title' => 'Welcome',
            'id' => $id,
        ]);
    }

}
