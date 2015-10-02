<?php

namespace Artesaos\Domain\Auth;

use Artesaos\Domain\Auth\Contracts\AuthService as AuthServiceContract;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(AuthServiceContract::class, AuthService::class);
    }
}
