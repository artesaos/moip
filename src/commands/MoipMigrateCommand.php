<?php namespace Artesaos\Moip\Commands;

use Illuminate\Console\Command;

class MoipMigrateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:migrate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Running migrations of package';

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
		$this->comment('running migrations artesaos/moip');
		$this->call('migrate', ['--package'=> 'artesaos/moip']);
		$this->comment('Migracoes executadas');	
	}
}
