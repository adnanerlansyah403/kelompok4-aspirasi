<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Route;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {

            if (!session()->isStarted()) session()->start();
            if (session()->get('logged', true)) {
                $view->with('auth', User::query()->where('id', session()->get('id_user'))->first());
            }

            $view->with('currentRoute', Route::currentRouteName());
        });
    }
}
