<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipReasonCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:reason';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'New reason sales.';

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
	 * @return mixed
	 */
	public function fire()
	{
		$reason = $this->ask('Motivo da venda:');
		$moip = Moip::first();
		$moip->reason = $reason;
		$moip->save();
	}
}