<?php

namespace App\Providers;

use Inertia\Inertia;
use App\Models\Device;
use Illuminate\Support\Facades\Session;
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

    

        // Walidacja
        Inertia::share([
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
        ]);
        Inertia::share('flash', function () {
            return [
                'message' => Session::get('message'),
                'danger' => Session::get('danger'),
            ];
        });

    }
}
