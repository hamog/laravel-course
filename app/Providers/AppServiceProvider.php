<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\View\View;
use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //global
        ViewFacade::share('language', 'farsi');

        //view composer
        ViewFacade::composer(['post.index', 'about'], function (View $view) {
            $view->with('title', 'Posts Title');
//            $view->with([
//                'key' => 'value',
//                'key2' => 'value2',
//                'key3' => 'value3',
//            ]);
        });

        Paginator::useBootstrapFive();
    }
}
