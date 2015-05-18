<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipCreditCardCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:creditcard';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Cred Card settings.';

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
		$moip = Moip::first();
		$moip->creditCard = $this->confirm('Cartao de credido ativo? [yes|no]');
		$moip->save();
	}
}
