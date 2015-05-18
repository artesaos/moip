<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipDebitCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:debit';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Debit settings.';

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
		$moip->debitCard = $this->confirm('Debito ativado? [yes|no]');
		$moip->save();
	}
}
