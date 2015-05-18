<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipDebitCardCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:debitcard';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Debit Card settings.';

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
		$moip = Moip::first();
		$moip->creditCard = $this->confirm('Cartao de debito ativado? [yes|no]');
		$moip->save();
	}
}
