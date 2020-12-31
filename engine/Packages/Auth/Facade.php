<?php

namespace Engine\Packages\Auth;

use Engine\Packages\ServiceBus;

/**
 * Auth.php
 *
 * Decorator class for authentication.
 */
class Facade
{

    /**
     * Registers new user.
     *
     * @access public
     * @param array $user - User credentials
     * @return bool
     */
    public static function register(int $id, string $password): bool
    {
        return ServiceBus::instance()->get('auth')->register($id, $password);
    }

    /**
     * Logs user in.
     *
     * @access public
     * @param int $id - User id
     * @param string $password - User password
     * @return bool
     */
    public static function login(int $id, string $password): bool
    {
        return ServiceBus::instance()->get('auth')->login($id, $password);
    }

    /**
     * Gives id if user is authenticated.
     *
     * @access public
     * @return int
     */
    public static function authenticated(): int
    {
        return ServiceBus::instance()->get('auth')->authenticated();
    }

    /**
     * Checks if user has certain permissions.
     *
     * @access public
     * @param int $id - User  id
     * @param array $permissions - Permissions list
     * @return bool
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
