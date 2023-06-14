<?php

namespace App\Providers;

use App\View\Components\PostNavbar;
use Illuminate\Support\Facades\Blade;
use Livewire\Macros\DuskBrowserMacros;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Pagination\Paginator as PaginationPaginator;

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
        Blade::component('post-navbar', PostNavbar::class);
        PaginationPaginator::useBootstrap();

       

    }
}
