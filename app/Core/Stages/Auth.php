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
        if ($state->request->parameters['route'] == '/' ||
            $state->request->parameters['route'] == '/login' ||
            $state->request->parameters['route'] == '/register') {
            return $state;
        }

        if (!$state->session->contains('auth')) {
            header("location: /login");
            exit;
        }

        return $state;
    }

}