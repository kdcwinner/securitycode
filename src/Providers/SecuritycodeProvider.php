<?php

namespace Kdcwinner\Securitycode\Providers;

use Illuminate\Support\ServiceProvider;


class SecuritycodeProvider extends ServiceProvider{

	/**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
          $this->loadViewsFrom(__DIR__.'/../views', 'securitycode');
    }
}