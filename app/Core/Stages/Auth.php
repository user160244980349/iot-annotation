<?php

namespace App\Core\Stages;

use App\Core\AppState;

/**
 * Auth.php
 *
 * Service class for authorize users.
 */
class Auth implements StageInterface
{
    /**
     * StageInterface method.
     *
     * @param AppState $state.
     * @return AppState Modified container.
     * @access public.
     */
    public function let (AppState $state)
    {
        if ($state->controllerCall->getMethodName()[0] == 'App\Controller\ExceptionController' ||
            $state->controllerCall->getMethodName()[0] == 'App\Controller\WelcomeController' ||
            $state->controllerCall->getMethodName()[0] == 'App\Controller\RegisterController' ||
            $state->controllerCall->getMethodName()[0] == 'App\Controller\LoginController') {
            return $state;
        }

        if (!$state->session->contains('auth')) {
            header("location: /login");
            exit;
        }

        return $state;
    }

}