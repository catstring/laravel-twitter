<?php

namespace App\Providers;

use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;
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
        Paginator::useBootstrapFive();

        $topUsers = Cache::remember('topUsers', 60 * 1, function(){
            return User::withCount('ideas')
            ->orderBy('ideas_count', 'DESC')
            ->limit(5)->get();
        });

        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        View::share(
            'topUsers',
            $topUsers
        );
    }
}
