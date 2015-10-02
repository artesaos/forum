<?php

namespace Artesaos\Domain\Auth\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;

interface AuthService
{
    /**
     * @param array $credentials
     *
     * @param bool  $remeber
     *
     * @return true
     */
    public function byCredentials(array $credentials, $remeber = false);

    /**
     * @param Authenticatable $user
     *
     * @param bool            $remember
     */
    public function login(Authenticatable $user, $remember = false);

    /**
     *
     * @param bool
     */
    public function logout();
}
