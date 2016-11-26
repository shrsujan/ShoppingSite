<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\Role\RoleRepositoryInterface::class, \App\Repositories\Role\RoleRepository::class);
        $this->app->bind(\App\Repositories\Permission\PermissionRepositoryInterface::class, \App\Repositories\Permission\PermissionRepository::class);
    }
}
