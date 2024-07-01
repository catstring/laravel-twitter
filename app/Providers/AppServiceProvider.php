<?php

namespace App\Providers;

use App\Models\User;
use illuminate\Pagination\Paginator;
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
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }
        // Paginator::useBootstrapFive();

        View::share(
            'topUsers',
            $topUsers = User::withCount('ideas')
                ->orderBy('created_at', 'DESC')
                ->limit(5)->get()
        );
    }
}
