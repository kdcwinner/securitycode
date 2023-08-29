<?php

namespace Kdcwinner\Securitycode;

use Illuminate\Support\ServiceProvider;

class SecuritycodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind("Kdcwinner\Securitycode\ConfigrationController",function($app){
            return new ConfigrationController();
        });
        $this->app->bind("Kdcwinner\Securitycode\SecuritycodeController",function($app){
            return new SecuritycodeController();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      //  $this->loadRou.'/routes/web.php';
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadViewsFrom(__DIR__.'/views','securitycode');

    }
}
