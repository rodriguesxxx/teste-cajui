<?php

namespace App\Providers;

use App\Services\AuthService;
use App\Services\DisciplinaService;
use App\Services\IAuthService;
use App\Services\IDisciplinaService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $bindings = [
            IAuthService::class => AuthService::class,
            IDisciplinaService::class => DisciplinaService::class,
        ];

        foreach ($bindings as $interface => $service) {
            $this->app->bind($interface, $service);
        }
    }
}
