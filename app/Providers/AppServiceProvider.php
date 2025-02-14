<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

   
    public function boot(): void
    {

        $this->setPasswordDefault();
      
    }

    private function setPasswordDefault():void
    {
        Password::defaults(function () {
            return Password::min(6)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols();
          });
    }
}
