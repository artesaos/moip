<?php namespace Artesaos\Moip\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class MoipConfigCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:config';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Criar arquivo de configuracao';

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
		$this->call('config:publish', ["--path" => "vendor/artesaos/moip/src/config", "artesaos/moip"]);
	}
}
