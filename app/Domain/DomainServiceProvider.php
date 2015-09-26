<?php

namespace Artesaos\Domain;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \Artesaos\Domain\Questions\Contracts\QuestionRepository::class,
            \Artesaos\Domain\Questions\QuestionRepository::class
        );

        $this->app->singleton(
            \Artesaos\Domain\Answers\Contracts\AnswerRepository::class,
            \Artesaos\Domain\Answers\AnswerRepository::class
        );
    }

}
