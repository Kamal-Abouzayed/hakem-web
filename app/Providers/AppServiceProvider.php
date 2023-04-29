<?php

namespace App\Providers;

use App\Models\Section;
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
            $view->with('sections', Section::all());
            $view->with('homeSections', Section::where('slug', '!=', 'medicines')->get());
        });
    }
}
