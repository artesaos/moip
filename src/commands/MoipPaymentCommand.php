<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipPaymentCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:payment';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Settings related to payment methods';

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
		$this->call('moip:billet');
		$this->call('moip:creditcard');
		$this->call('moip:financing');
		$this->call('moip:debit');
		$this->call('moip:debitcard');
	}
}
