<?php

namespace Artesaos\Moip\Providers;

use Artesaos\Moip\Moip;
use Moip\Moip as Api;
use Moip\MoipBasicAuth;
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
        $this->app->singleton('moip', function(){
            return new Moip(new Api(new MoipBasicAuth(config('moip.credentials.token'), config('moip.credentials.key')), $this->getHomologated()));
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
        $this->publishes([__DIR__.'/../../config/moip.php' => config_path('/artesaos/moip.php')], 'config');
        $this->mergeConfigFrom(__DIR__.'/../../config/moip.php', config_path('/artesaos/moip.php', 'config'));
    }

    /**
     * Get endpoint of request.
     *
     * @return \Moip\Moip::ENDPOINT_PRODUCTION|\Moip\Moip::ENDPOINT_SANDBOX
     */
    private function getHomologated()
    {
        return config('moip.homologated') === true ? Api::ENDPOINT_PRODUCTION : Api::ENDPOINT_SANDBOX;
    }
}
