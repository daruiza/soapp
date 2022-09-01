<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Http\Controllers\Api\AuthController;
use App\Query\Abstraction\IAuthQuery;
use App\Query\Request\AuthQuery;

use App\Http\Controllers\Api\CommerceController;
use App\Query\Abstraction\ICommerceQuery;
use App\Query\Request\CommerceQuery;

use App\Http\Controllers\Api\UserController;
use App\Query\Abstraction\IUserQuery;
use App\Query\Request\UserQuery;

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

        $this->app->bind(ICommerceQuery::class, CommerceQuery::class);
        $this->app->make(CommerceController::class);

        $this->app->bind(IUserQuery::class, UserQuery::class);
        $this->app->make(UserController::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
