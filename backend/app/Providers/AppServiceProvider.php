<?php

namespace App\Providers;

use App\Builders\ResponseBuilder;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('api-response', function () {
            return new ResponseBuilder();
        });
    }

    public function boot(): void
    {
        AliasLoader::getInstance()->alias('Response', \App\Facades\Response::class);
    }
}
