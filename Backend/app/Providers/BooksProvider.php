<?php

namespace App\Providers;

use App\Service\Books;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class BooksProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [Books::class];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    public function provides()
    {
        return [Books::class];
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
