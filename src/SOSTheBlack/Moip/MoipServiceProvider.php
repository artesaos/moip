<?php namespace Artesaos\Moip;

use Illuminate\Support\ServiceProvider;

/**
 * Moip Service Provider
 * 
 * @author Jean Cesar Garcia <jeancesargarcia@gmail.com>
 * @version v1.6.0
 * @license <a href="http://www.opensource.org/licenses/bsd-license.php">BSD License</a>
 */
class MoipServiceProvider extends ServiceProvider {

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
		$this->package('artesaos/moip', 'artesaos');
		$this->commands('\Artesaos\Moip\Commands\MoipAssetsCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipAuthCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipBilletCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipConfigCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipCreditCardCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipDebitCardCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipFinancingCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipInstallCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipMigrateCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipPaymentCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipReasonCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipReceiverCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipSeedsCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipUrlReturnCommand');
		$this->commands('\Artesaos\Moip\Commands\MoipUrlNotificationCommand');
		$path = $this->guessPackagePath();
        require_once $path.'/routes.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('moip', function(){
			return new \Artesaos\Moip\Moip;
		});

		$this->app->singleton('controller', function(){
			return new \Artesaos\Moip\Controllers\MoipController;
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return string[]
	 */
	public function provides()
	{
		return array('artesaos.moip', 'artesaos.another-moip');
	}

}
