<?php

namespace App\Providers;

use App\Facades\ResponderProviderFacade;
use App\Services\Provider\ApiResponderProvider;
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
        ResponderProviderFacade::shouldProxyTo(ApiResponderProvider::class);
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
