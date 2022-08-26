<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Query\Abstraction\IAuthQuery;
use App\Query\Request\AuthQuery;
use App\Http\Controllers\Api\AuthController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IAuthQuery::class, AuthQuery::class);
        $this->app->make(AuthController::class);
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
