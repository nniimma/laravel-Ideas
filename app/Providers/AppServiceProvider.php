<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
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

        // ttl is time to live and it is in seconds:
        $topUsers = Cache::remember('topUsers', 60 * 3, function () {
            return User::withCount('ideas')->orderBy('ideas_count', 'DESC')->limit(5)->get();
        });

        // the withCount that we use should be with the name of the function that we use in the model: it will add it to functionName_count (in this case: ideas_count)
        // global variable:
        View::share("topUsers", $topUsers);

        //! to clear the cache: 
        //todo: Cache::flush();
    }
}
