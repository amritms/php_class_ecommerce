<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use Illuminate\View\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('categories.sidebar_categories', function(View $view){
            $view->with('categories', Category::orderBy('name')->get());
        });


        
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
