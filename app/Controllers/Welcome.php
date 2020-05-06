<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;

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
        $data = Auth::user();
        $request->view = new View('welcome.tpl', [
            'title' => 'Welcome',
            'id' => $data['id'],
            'name' => $data['name'],
        ]);
    }

}
