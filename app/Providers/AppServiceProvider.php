<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Faq;
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

            $section = Section::where('slug', request()->sectionSlug)->first();

            $view->with('sections', Section::all());
            $view->with('homeSections', Section::where('slug', '!=', 'medicines')->get());
            $view->with('faqs', Faq::all());

            if ($section) {
                $view->with('relatedContent', Article::where('section_id', $section->id)->get());
            }
        });
    }
}
