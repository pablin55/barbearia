<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Attempting;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(Attempting::class, function ($event) {

            $user = User::where('email', $event->credentials['email'])->first();

            if ($user && !$user->canLogin()) {

                abort(403, 'Barbeiro inativo. Fale com o administrador.');
            }
        });
    }
}