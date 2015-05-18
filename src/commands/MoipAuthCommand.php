<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipAuthCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:auth';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Sets environment and credentials';

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
		$environment= $this->confirm('Ambiente [yes producao|no para Sandbox]') ? 'Moip' : 'Sandbox';
		$token 		= $this->ask('token '.$environment);
		$key 		= $this->secret('Key '.$environment);
		$moip = Moip::first();
		$moip->environment = $environment === 'Moip' ? 1 : 0;
		$moip->token 	= $token;
		$moip->key 		= $key;
		$moip->save();	
	}
}
