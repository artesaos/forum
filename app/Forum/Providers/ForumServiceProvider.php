<?php

namespace Artesaos\Forum\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class ForumServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'forum');
        $this->routes($this->app['router']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function routes(Router $route)
    {
        $route->group(['namespace' => 'Artesaos\Forum\Http\Controllers'], function () {
            return require app_path('Forum/Http/routes.php');
        });
    }
}
