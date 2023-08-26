<?php

namespace Kdcwinner\Securitycode;

use Illuminate\Support\ServiceProvider;

class SecuritycodeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishResources();
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/securitycode.php', 'securitycode');

        $this->app->bind('securitycode', function () {
            return new Securitycode();
        });
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__ . '/../config/securitycode.php' => config_path('securitycode.php'),
        ], 'securitycode-config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_securitycodes_table.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_securitycodes_table.php'),
        ], 'securitycode-migrations');

        
    }
}
