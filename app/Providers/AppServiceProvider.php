<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind('S3Service', \App\Services\S3\S3Service::class);
        $this->app->bind('CustomerService', \App\Services\Customer\CustomerService::class);
    }


    public function boot(): void
    {
        //
    }
}
