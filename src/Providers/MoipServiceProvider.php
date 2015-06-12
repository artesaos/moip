<?php namespace Artesaos\Moip\Providers;

use Artesaos\Moip\Moip;
use Illuminate\Support\ServiceProvider;

class MoipServiceProvider extends ServiceProvider 
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() 
    {
        $this->handleMigrations();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() 
    {
        $this->app->singleton('moipapi', function($app)
        {
            return $app->make(Moip::class);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() 
    {
        return [];
    }

    /**
     * handle Migrations
     * 
     * @return void
     */
    private function handleMigrations() 
    {
        $this->publishes([__DIR__ . '/../../migrations' => base_path('database/migrations')]);
    }
}
