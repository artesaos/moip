<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipUrlNotificationCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:urlnotification';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'URL de envio do NASP (callback).';

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
		$url = $this->ask('URL de notificação NASP:');
		$moip = Moip::first();	
		$moip->url_notification = $url;
		$moip->save();
	}
}
