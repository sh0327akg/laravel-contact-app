<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Repositories\ContactRepositoryInterface::class,
            \App\Repositories\ContactRepository::class
        );

        $this->app->bind(
            \App\Services\ContactServiceInterface::class,
            function($app){
                return new \App\Services\ContactService(
                    $app->make(\App\Repositories\ContactRepositoryInterface::class)
                );
            }
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
