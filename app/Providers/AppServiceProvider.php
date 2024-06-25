<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        // by default is tailwind but you can change it to any library that you want.
        Paginator::useBootstrapFive();

        // the withCount that we use should be with the name of the function that we use in the model: it will add it to functionName_count (in this case: ideas_count)
        // global variable:
        View::share("topUsers", User::withCount('ideas')->orderBy('ideas_count', 'DESC')->limit(5)->get());
    }
}
