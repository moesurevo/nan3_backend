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
            \App\Repositories\Subcategory\SubcategoryInterface::class,
            \App\Repositories\Subcategory\SubcategoryRepository::class
        );
        $this->app->bind(
            \App\Repositories\Quiz\QuizInterface::class,
            \App\Repositories\Quiz\QuizRepository::class
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
