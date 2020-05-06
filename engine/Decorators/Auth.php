<?php

namespace Engine\Decorators;

use Engine\ServiceBus;

/**
 * Auth.php
 *
 * Decorator class for authentication.
 */
class Auth
{

    /**
     * Register new user.
     *
     * @access public
     * @param array $user User credentials
     * @return bool
     */
    public static function register(array $user): bool
    {
        return ServiceBus::instance()->get('auth')->register($user);
    }

    /**
     * Log user in.
     *
     * @access public.
     * @param array $user .
     * @return bool.
     */
    public static function login(array $user): bool
    {
        return ServiceBus::instance()->get('auth')->login($user);
    }

    /**
     * Gives authorized user id.
     *
     * @access public.
     * @return null|int.
     */
    public static function userId()
    {
        return ServiceBus::instance()->get('auth')->userId();
    }

    /**
     * Gives authorized user.
     *
     * @access public.
     * @return null|array.
     */
    public static function user()
    {
        return ServiceBus::instance()->get('auth')->user();
    }

    /**
     * Gives true if user authenticated.
     *
     * @access public.
     * @return bool.
     */
    public static function authenticated(): bool
    {
        return ServiceBus::instance()->get('auth')->authenticated();
    }

    /**
     * Check if user has permissions.
     *
     * @access public.
     * @param int $id .
     * @param array $permissions Permissions list.
     * @return bool.
     */
    public static function allowed(int $id, array $permissions): bool
    {
        return ServiceBus::instance()->get('auth')->allowed($id, $permissions);
    }


    /**
     * Associates user with group.
     *
     * @access public.
     * @param int $id .
     * @param string $group .
     * @return array.
     */
    public static function associate(int $id, string $group): array
    {
        return ServiceBus::instance()->get('auth')->associate($id, $group);
    }


    /**
     * Gives permissions of user.
     *
     * @access public.
     * @param int $id .
     * @return array.
     */
    public static function permissions(int $id): array
    {
        return ServiceBus::instance()->get('auth')->permissions($id);
    }

    /**
     * Logs user out.
     *
     * @access public.
     */
    public static function logout(): void
    {
        ServiceBus::instance()->get('auth')->logout();
    }

}
