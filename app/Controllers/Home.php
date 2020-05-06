<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
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
     * Go to home page.
     *
     * @access public.
     * @param Request $request .
     */
    public static function toHomePage(Request $request)
    {
        $data = Auth::user();
        $request->view = new View('home.tpl', [
            'title' => 'Home',
            'id' => $data['id'],
            'name' => $data['name'],
        ]);
    }

}
