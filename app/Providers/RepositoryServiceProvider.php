<?php

namespace App\Providers;

use App\Repositories\DbNewsRepository;
use App\Repositories\Interfaces\NewsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            NewsRepositoryInterface::class, 
            DbNewsRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
