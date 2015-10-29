<?php

namespace Artesaos\Domain\Auth;

use Artesaos\Domain\Auth\Contracts\AuthService as AuthServiceContract;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;

class AuthService implements AuthServiceContract
{
    /**
     * @var Guard
     */
    private $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param array $credentials
     *
     * @param bool  $remeber
     *
     * @return true
     */
    public function byCredentials(array $credentials, $remeber = false)
    {
        $email = array_get($credentials, 'email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $credentials['username'] = $email;
            unset($credentials['email']);
        }

        return $this->auth->attempt($credentials);
    }

    /**
     * @param Authenticatable $user
     *
     * @param bool            $remember
     */
    public function login(Authenticatable $user, $remember = false)
    {
        return $this->auth->login($user);
    }

    /**
     * @return void
     */
    public function logout()
    {
        $this->auth->logout();
    }
}
