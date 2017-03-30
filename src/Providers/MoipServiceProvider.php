<?php

namespace Artesaos\Moip\Providers;

use Artesaos\Moip\Moip;
use Moip\Moip as Api;
use Illuminate\Support\ServiceProvider;

class MoipServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->handleConfigs();
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('moip', Moip::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['moip'];
    }

    /**
     * Publishes and Merge configs.
     */
    public function handleConfigs()
    {
        $this->publishes([__DIR__.'/../../config/moip.php' => config_path('/artesaos/moip.php')], 'config');
        $this->mergeConfigFrom(__DIR__.'/../../config/moip.php', config_path('/artesaos/moip.php', 'config'));
    }
}
