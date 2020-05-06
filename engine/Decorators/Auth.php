<?php

namespace Engine\Decorators;

use Engine\ServiceBus;
use PDOStatement;

/**
 * Receiver.php
 *
 * Middleware class for parsing incoming request.
 */
class Auth
{

    /**
     * Register new user.
     *
     * @access public.
     * @param array $user User credentials.
     * @return bool
     */
    public static function register(array $user)
    {
        return ServiceBus::instance()->get('auth')->register($user);
    }

    /**
     * Log user in.
     *
     * @access public.
     * @param array $user
     * @return bool
     */
    public static function login(array $user)
    {
        return ServiceBus::instance()->get('auth')->login($user);
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return int.
     */
    public static function userId()
    {
        return ServiceBus::instance()->get('auth')->userId();
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return false|PDOStatement
     */
    public static function user()
    {
        return ServiceBus::instance()->get('auth')->user();
    }

    /**
     * Get authorized user.
     *
     * @access public.
     * @return bool
     */
    public static function authenticated()
    {
        return ServiceBus::instance()->get('auth')->authenticated();
    }

    /**
     * Check if user has permissions.
     *
     * @access public.
     * @param int $id
     * @param array $permissions Permissions list.
     * @return bool
     */
    public static function allowed(int $id, array $permissions)
    {
        return ServiceBus::instance()->get('auth')->allowed($id, $permissions);
    }


    /**
     * Log user out.
     *
     * @access public.
     * @param int $id
     * @param string $group
     * @return array
     */
    public static function associate(int $id, string $group)
    {
        return ServiceBus::instance()->get('auth')->associate($id, $group);
    }


    /**
     * Log user out.
     *
     * @access public.
     * @param int $id
     * @return array
     */
    public static function permissions(int $id)
    {
        return ServiceBus::instance()->get('auth')->permissions($id);
    }

    /**
     * Log user out.
     *
     * @access public.
     */
    public static function logout()
    {
        return ServiceBus::instance()->get('auth')->logout();
    }

}
