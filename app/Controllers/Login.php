<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;

/**
 * WelcomeController.php
 *
 * Controller class for loading login page.
 */
class Login
{

    /**
     * Go to login page.
     *
     * @access public.
     * @param Request $request.
     */
    public static function toLoginPage(Request $request)
    {
        if (Auth::authenticated()) {
            header("location: /home");
            exit;
        }

        $request->view = new View('login.tpl', [
            'title' => 'Login',
        ]);
    }

    /**
     * Log user in.
     *
     * @access public.
     * @param Request $request.
     */
    public static function login(Request $request)
    {
        if (Auth::login($request->parameters['user'])) {
            header("location: /home");
            exit;
        }
        header("location: /login");
        exit;
    }

    /**
     * Log user out.
     *
     * @access public.
     * @param Request $request.
     */
    public static function logout(Request $request)
    {
        Auth::logout();
        header("location: /");
        exit;
    }

}
