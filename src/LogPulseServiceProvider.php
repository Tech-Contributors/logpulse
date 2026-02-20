<?php

namespace TechContributors\LogPulse;

use Illuminate\Support\ServiceProvider;
use TechContributors\LogPulse\LogPulse;

class LogPulseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/log-pulse.php',
            'log-pulse'
        );

        $this->app->singleton('log-pulse', function () {
            return new LogPulse();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/Config/log-pulse.php' => config_path('log-pulse.php'),
        ], 'log-pulse-config');

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'log-pulse');
    }
}
