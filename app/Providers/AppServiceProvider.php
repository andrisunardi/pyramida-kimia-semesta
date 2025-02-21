<?php

namespace App\Providers;

use Andrisunardi\Library\Utils;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if (app()->isLocal()) {
            app()->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    public function boot(): void
    {
        Utils::boot();

        LogViewer::auth(fn ($request) => optional($request->user())->hasRole('Super User') ?? false);

        Gate::before(function (User $user) {
            return $user->hasRole('Super User');
        });

        Gate::after(function (User $user) {
            return $user->hasRole('Super User');
        });
    }
}
