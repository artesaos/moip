<?php

namespace Artesaos\Moip\Providers;

use Artesaos\Moip\Moip;
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
        $config_file = __DIR__.'/../../config/moip.php';

        if ($this->isLumen()) {
            $this->app->configure('moip');
        } else {
            $this->publishes([$config_file => config_path('moip.php')]);
        }

        $this->mergeConfigFrom($config_file, 'moip');
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
     * @return bool
     */
    private function isLumen()
    {
        return true === str_contains($this->app->version(), 'Lumen');
    }
}
