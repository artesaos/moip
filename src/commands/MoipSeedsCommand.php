<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipSeedsCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:seeds';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Running seeds of package';

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
		$this->comment('running seeds artesaos/moip');
		if (Moip::all()->count() === 0) {
			Moip::create([]);
			$this->line('<info>Seeded: </info>MoipSeeder');
		}
		$this->call('db:seed', ['--class' => 'DatabaseMoipSeeder']);
		$this->comment('Seeds executados');
	}
}
