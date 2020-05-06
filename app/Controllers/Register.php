<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;

/**
 * Register.php
 *
 * Controller class for managing registration.
 */
class Register
{

    /**
     * Go to register page.
     *
     * @param Request $request.
     * @access public.
     */
    public static function toRegisterPage(Request $request)
    {
        if (Auth::authenticated()) {
            header("location: /home");
            exit;
        }

        $request->view = new View('register.tpl', [
            'title' => 'Register',
        ]);
    }

    /**
     * Register new user.
     *
     * @param Request $request.
     * @access public.
     */
    public static function register(Request $request)
    {

        if (Auth::register($request->parameters['user'])) {
            if (Auth::login($request->parameters['user'])) {
                header("location: /home");
                exit;
            }
        }

        header("location: /register");
        exit;
    }

}
