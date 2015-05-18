<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipUrlReturnCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:urlreturn';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'URL que o cliente será redirecionado ao finalizar o pagamento no checkout';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$url = $this->ask('URL de retorno:');
		$moip = Moip::first();	
		$moip->url_return = $url;
		$moip->save();
	}

}
