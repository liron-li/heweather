<?php

namespace Liron\Heweather;


use Illuminate\Contracts\Container\Container;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/weather.php' => config_path('weather.php')]);
        }
    }

    public function register()
    {
        $this->app->bind('weather', function (Container $app) {
            return new Weather(
                $app['config']['weather']['username'],
                $app['config']['weather']['key'],
                $app['config']['weather']['paying']
            );
        });
    }

    public function provides()
    {
        return ['weather'];
    }
}