<?php

namespace App\Providers;

use App\Models\ProductCatagory;
use Illuminate\Support\Facades\View;
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
    // public function boot()
    // {
    //     View::share('count_computers', ProductComputers::sum('quantity'));

    //     View::share('computers', ProductComputers::all());

    // }


    public function boot()
    {
        View::composer('partials.services', function ($view) {
            $view->with('categories', ProductCatagory::all());
        });

        View::share('categories', ProductCatagory::all());
    }
}
