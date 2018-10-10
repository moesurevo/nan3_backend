<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Quiztitle\QuiztitleInterface::class,
            \App\Repositories\Quiztitle\QuiztitleRepository::class
        );
        $this->app->bind(
            \App\Repositories\Question\QuestionInterface::class,
            \App\Repositories\Question\QuestionRepository::class
        );
        $this->app->bind(
            \App\Repositories\Answer\AnswerInterface::class,
            \App\Repositories\Answer\AnswerRepository::class
        );
        $this->app->bind(
            \App\Repositories\Replier\ReplierInterface::class,
            \App\Repositories\Replier\ReplierRepository::class
        );
        $this->app->bind(
            \App\Repositories\User\UserInterface::class,
            \App\Repositories\User\UserRepository::class
        );
    }
}
