<?php

namespace App\Providers;
use App\Services\MontyEsimService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

        // Register MontyEsimService as a singleton
        $this->app->singleton(MontyEsimService::class, function ($app) {
            return new MontyEsimService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
