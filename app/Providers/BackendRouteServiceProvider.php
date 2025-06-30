<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class BackendRouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->mapBackendRoutes();
    }

    /**
     * Define the "backend" routes for the application.
     */
    protected function mapBackendRoutes()
    {
        Route::middleware('api')           // use API middleware group
             ->group(base_path('routes/api.php'));  // load routes from routes/backend.php
    }
}
