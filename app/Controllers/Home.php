<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
use App\Models\User;

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
