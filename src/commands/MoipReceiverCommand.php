<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipReceiverCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:receiver';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Setting the primary receiver.';

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
		$receiver = $this->ask('Recebidor primario: ');
		$moip = Moip::first();
		$moip->receiver = $receiver;
		$moip->save();
	}
}
