<?php

declare (strict_types = 1);

namespace Xuap\ReduxPanelLib\Providers;

use Illuminate\Support\ServiceProvider;
use Xuap\ReduxPanelLib\Console\InstallReduxPanelLib;

class ReduxPanelServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'reduxpanel');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallReduxPanelLib::class,
            ]);
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('reduxpanel.php'),
            ], 'config');
        }
    }
}
