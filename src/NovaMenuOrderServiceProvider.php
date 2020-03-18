<?php

namespace NormanHuth\NovaMenuOrder;

use Illuminate\Support\ServiceProvider;

class NovaMenuOrderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/nova-group-order.php' => config_path('nova-group-order.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/navigation.blade.php' => resource_path('views/vendor/nova/resources/navigation.blade.php')
        ], 'view');
    }
}
