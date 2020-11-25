<?php

namespace App\Controllers;

use App\Models\User;
use Engine\Decorators\Auth;
use Engine\Decorators\Debug;
use Engine\Request;
use Engine\View;

/**
 * Home.php
 *
 * Controller class for loading home page.
 */
class Home
{

    /**
     * Goes to home page.
     *
     * @access public
     * @param Request $request
     */
    public static function toHomePage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('home.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

}
