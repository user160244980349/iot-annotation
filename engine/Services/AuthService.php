<?php

namespace Engine\Services;

use App\Models\Password;
use App\Models\Permission;
use Engine\Service;
use Engine\Services\SessionService as Session;

/**
 * Auth.php
 *
 * Auth service.
 */
class AuthService extends Service
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'auth';

    /**
     * Gives authorized user id.
     *
     * @access public
     * @return int
     */
    protected function authenticated(): int
    {
        $id = Session::get('id');
        if (isset($id)) {
            return $id;
        }
        return 0;
    }

    /**
     * Checks if user has permissions.
     *
     * @access public
     * @param int $id - User id
     * @param array $permissions - Permissions list
     * @return bool
     */
    protected function allowed(int $id, array $permissions): bool
    {
        $user_permissions = Permission::getForUser($id);
        $difference = array_diff($permissions, $user_permissions);
        if (count($difference)) {
            return false;
        }
        return true;
    }

    /**
     * Registers new user.
     *
     * @access public
     * @param int $user - User id
     * @param string $password - User password
     * @return bool
     */
    protected function register(int $id, string $password): bool
    {   
        Password::create($id, $this->encrypt($password));
        return true;
    }

    /**
     * Logs user in.
     *
     * @access public
     * @param id $user - User id
     * @param string $password - His password
     * @return bool
     */
    protected function login(int $id, string $password): bool
    {
        $stored_password = Password::getValue($id);
        if ($stored_password['value'] != $this->encrypt($password)) {
            return false;
        }
        
        Session::set('id', $id);
        return true;
    }

    /**
     * Encrypts passwords.
     *
     * @param string $password - Account password
     * @access public
     * @return string
     */
    protected function encrypt(string $password): string
    {
        return md5(md5($password));
    }

    /**
     * Logs user out.
     *
     * @access public
     * @return void
     */
    protected function logout(): void
    {
        Session::destroy();
    }

}
