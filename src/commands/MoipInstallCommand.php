<?php namespace Artesaos\Moip\Commands;

use Illuminate\Console\Command;

class MoipInstallCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:install';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Complete installation and configuration';

	/**
	 * Create a new command instance.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->migrate();
		$this->seeds();
		$this->config();
		$this->assets();
		$this->auth();
		$this->reason();
		$this->receiver();
		$this->payment();
		$this->urlnotification();
		$this->urlreturn();
	}

	/**
	 * migrate
	 * 
	 * @return void
	 */
	private function migrate()
	{
		if ($this->confirm('Executar migracoes? [yes|no]')) {
			$this->call('moip:migrate');
		}
	}

	/**
	 * seeds
	 * 
	 * @return void
	 */
	private function seeds()
	{
		if ($this->confirm('Executar seeds do package? [yes|no]')) {
			$this->call('moip:seeds');
		}
	}

	/**
	 * config
	 * 
	 * @return void
	 */
	private function config()
	{
		if ($this->confirm('Publicar arquivo de configuracao? [yes|no]')) {
			$this->call('moip:config');
		}
	}

	/**
	 * assets
	 * 
	 * @return void
	 */
	private function assets()
	{
		if ($this->confirm('Publicar Asses? [yes|no]')) {
			$this->call('moip:assets');
		}
	}

	/**
	 * auth
	 * 
	 * @return void
	 */
	private function auth()
	{
		if ($this->confirm('Configurar credenciais? [yes|no]')) {
			$this->call('moip:auth');
		}
	}

	/**
	 * reason
	 * 
	 * @return void
	 */
	private function reason()
	{
		if ($this->confirm('Configurar motivo da venda? [yes|no]')) {
			$this->call('moip:reason');
		}
	}

	/**
	 * receiver
	 * 
	 * @return void
	 */
	private function receiver()
	{
		if ($this->confirm('Configurar recebedor primario? [yes|no]')) {
			$this->call('moip:receiver');
		}
	}

	/**
	 * payment
	 * 
	 * @return void
	 */
	private function payment()
	{
		if ($this->confirm('Configurar metodos de pagamentos? [yes|no]')) {
			$this->call('moip:payment');
		}
	}
	/**
	 * urlnotification
	 * 
	 * @return void
	 */
	private function urlnotification()
	{
		if ($this->confirm('Configurar URL NASP? [yes|no]')) {
			$this->call('moip:urlnotification');	
		}
	}

	/**
	 * urlreturn
	 * 
	 * @return void
	 */
	private function urlreturn()
	{
		if ($this->confirm('Configurar URL de retorno? [yes|no]')) {
			$this->call('moip:urlreturn');	
		}
	}
}
