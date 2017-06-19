<?php

namespace Artesaos\Moip\Providers;

use Artesaos\Moip\Moip;
use Illuminate\Support\ServiceProvider;
use Moip\Moip as Api;
use Moip\Auth\BasicAuth;

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
        $this->app->singleton('moip', function(){
            return new Moip(new Api(new BasicAuth($this->app->make('config')->get('moip.credentials.token'), $this->app->make('config')->get('moip.credentials.key')), $this->getHomologated()));
        });
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
     * Checks if the application is Lumen.
     *
     * @return bool
     */
    private function isLumen()
    {
        return true === str_contains($this->app->version(), 'Lumen');
    }

    /**
     * Get endpoint of request.
     *
     * @return string
     */
    private function getHomologated()
    {
        return $this->app->make('config')->get('moip.homologated') === true ? Api::ENDPOINT_PRODUCTION : Api::ENDPOINT_SANDBOX;
    }
}
