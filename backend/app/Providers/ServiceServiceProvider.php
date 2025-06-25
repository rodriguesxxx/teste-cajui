<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\IAuthService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $bindings = [
            IAuthService::class => AuthService::class,
        ];

        foreach ($bindings as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }
}
