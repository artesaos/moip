<?php

namespace Artesaos\Moip\Providers;

use Artesaos\Moip\Moip;
use Illuminate\Support\ServiceProvider;

/**
 * Class MoipServiceProvider.
 *
 * @package Artesaos\Moip\Providers
 */
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
        $config_file = __DIR__.'/../../config/moip.php';

        if ($this->isLumen()) {
            $this->app->configure('moip');
        } else {
            $this->publishes([$config_file => config_path('moip.php')]);
        }

        $this->mergeConfigFrom($config_file, 'moip');
    }

    /**
     * @return bool
     */
    private function isLumen()
    {
        return true === str_contains($this->app->version(), 'Lumen');
    }
}
