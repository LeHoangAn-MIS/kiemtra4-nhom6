<?php

namespace App\Providers;

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
     * @var string 
     */
    public const HOME = '/sach';
    public function boot(): void
    {
        //
    }
}
