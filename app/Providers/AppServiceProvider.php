<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

          view()->composer('layouts.sidebar',function($view){

            $view->with('archives',\App\Post::archives());
        });
        
         view()->composer('layouts.sidebar',function($view){

            $view->with('latests',\App\Post::recent_post());
        });
          view()->composer('welcome',function($view){

            $view->with('latests',\App\Post::recent_post());
        });
           view()->composer('layouts.sidebar',function($view){

            $view->with('categories',\App\Category::all());
        });
        view()->composer('layouts.sidebar',function($view){

            $view->with('users',\App\User::all());
        });
        view()->composer('layouts.app',function($view){

            $view->with('settings',\App\Setting::first());
        });
          view()->composer('welcome',function($view){

            $view->with('settings',\App\Setting::first());
        });
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
}
