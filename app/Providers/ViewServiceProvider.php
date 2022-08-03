<?php

namespace App\Providers;

use App\Brand;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Using Closure based composers...
        View::composer('layouts.navbars.sidebar', function ($view) {
           $brands = Brand::pluck('name','slug','id')->toArray();
            $view->with('brands', $brands);
        });
        View::composer('layouts.headers.site-header', function ($view) {

            $brand = Brand::with('brand_settings')->where('slug',request()->brand)->first();
            $view->with('brand', $brand);
        });

    }
}
