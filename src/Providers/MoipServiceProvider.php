<?php namespace Artesaos\Moip\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Artesaos\Moip\Moip;

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
        $this->app->singleton('moip', function()
        {
            return new Moip;
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
     * handle Configs
     * 
     * @return void
     * @access private
     * @package laravel5-package-template
     * @author Colin Viebrock <colin@viebrock.ca>
     * @ignore
     */
    private function handleConfigs() 
    {
        $configPath = __DIR__ . '/../../config/moip.php';
        $this->publishes([$configPath => config_path('moip.php')]);
        $this->mergeConfigFrom($configPath, 'moip');
    }

    /**
     * handle Translations
     * 
     * @return void
     * @access private
     * @package laravel5-package-template
     * @author Colin Viebrock <colin@viebrock.ca>
     * @ignore
     */
    private function handleTranslations() 
    {
        $this->loadTranslationsFrom('moip', __DIR__.'/../../lang');
    }

    /**
     * handle Views
     * 
     * @return void
     * @access private
     * @package laravel5-package-template
     * @author Colin Viebrock <colin@viebrock.ca>
     * @ignore
     */
    private function handleViews() 
    {
        $this->loadViewsFrom('moip', __DIR__.'/../../views');
        $this->publishes([__DIR__.'/../../views' => base_path('resources/views/vendor/moip')]);
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
    /**
     * handle Routes
     * 
     * @return void
     * @access private
     * @package laravel5-package-template
     * @author Colin Viebrock <colin@viebrock.ca>
     * @ignore
     */
    private function handleRoutes() 
    {
        include __DIR__.'/../../routes.php';
    }
}
