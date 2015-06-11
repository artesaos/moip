<?php namespace Artesaos\Moip\Providers;

# Packages
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

# Artesaos
use Artesaos\Moip\Moip;
use Artesaos\Moip\Model\Moip as MoipData;
use Artesaos\Moip\Repositories\Moip\MoipEloquent;
use Artesaos\Moip\Repositories\Moip\MoipServiceProvider as MoipEloquentServiceProvider;

/**
 * Create a new service provider
 * 
 * @package Artesaos\Moip
 * @subpackage Illuminate\Support
 * @author Jean C. Garcia <jeancesargarcia@gmail.com>
 * @author Colin Viebrock <colin@viebrock.ca>
 * @version 2.0.0
 * 
 */
class MoipServiceProvider extends LaravelServiceProvider 
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     * @access protected
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     * @access public
     * @package laravel5-package-template
     * @author Colin Viebrock <colin@viebrock.ca>
     * @author Jean C. Garcia <jeancesargarcia@gmail.com>
     */
    public function boot() 
    {
        $this->handleMigrations();
    }

    /**
     * Register the service provider.
     *
     * @return void
     * @access public
     * @package laravel5-package-template
     * @author Colin Viebrock <colin@viebrock.ca>
     */
    public function register() 
    {
        $this->app->singleton('moipapi', function($app)
        {
            return new Moip($app);
        });

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     * @access public
     * @package laravel5-package-template
     * @author Colin Viebrock <colin@viebrock.ca>
     */
    public function provides() 
    {
        return [];
    }

    /**
     * handle Migrations
     * 
     * @return void
     * @access private
     * @author Colin Viebrock <colin@viebrock.ca>
     * @package laravel5-package-template
     */
    private function handleMigrations() 
    {
        $this->publishes([__DIR__ . '/../../migrations' => base_path('database/migrations')]);
    }
}
