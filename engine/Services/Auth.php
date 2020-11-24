<?php

namespace Engine\Services;

use App\Models\Password;
use App\Models\Permission;
use App\Models\Group;
use Engine\Decorators\Session;

/**
 * Auth.php
 *
 * Auth service.
 */
class Auth
{
    /**
     * Application run method.
     *
     * @var public
     */
    static public $alias = "auth";

    /**
     * Get authorized user.
     *
     * @access public
     * @return int
     */
    public function authenticated(): int
    {
        $id = Session::get('id');
        if (isset($id)) {
            return $id;
        }
        return 0;
    }

    /**
     * Check if user has permissions.
     *
     * @access public
     * @param int $id
     * @param array $permissions Permissions list
     * @return bool
     */
    public function allowed(int $id, array $permissions): bool
    {
        $user_permissions = Permission::getForUser($id);
        $difference = array_diff($permissions, $user_permissions);
        if ($difference) {
            return false;
        }
        return true;
    }

    /**
     * Registers new user.
     *
     * @access public
     * @param array $user User credentials
     */
    public function register(int $id, string $password): bool
    {   
        Password::create($id, $this->encrypt($password));
        return true;
    }

    /**
     * Log user in.
     *
     * @access public
     * @param array $user
     * @return bool
     */
    public function login(int $id, string $password): bool
    {
        $stored_password = Password::getValue($id);

        if ($stored_password != $this->encrypt($password)) {
            return false;
        }
        
        Session::set('id', $id);
        return true;
    }

    /**
     * Log user out.
     *
     * @access public.
     */
    public function encrypt(string $password): string
    {
        return md5(md5($password));
    }

    /**
     * Log user out.
     *
     * @access public.
     */
    public function logout(): void
    {
        Session::destroy();
    }

}
