<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
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
<<<<<<< HEAD
    {
=======
    {   
>>>>>>> bc543f04fd163cef150e42a6c247eb3b91b36c8a
        if (App::environment('production')) {
            URL::forceScheme('https');
        }
    }
}
