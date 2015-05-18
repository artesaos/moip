<?php namespace Artesaos\Moip\Commands;

use Moip;
use Illuminate\Console\Command;

class MoipBilletCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'moip:billet';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Banking billet settings.';

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
		$moip = Moip::first();
		if ($this->confirm('Boleto bancario ativado? [yes|no]')) {
			$expiration 	= $this->ask('Dia do vencimento apos emissao do boleto (in days):');
			$working_days	= $this->confirm('Dias corridos? [yes corridos|no úteis]');
			$this->comment('Mensagem no boleto');
			$first_line		= $this->ask("Primeira linha:");
			$second_line	= $this->ask("Segunda linha:");
			$last_line		= $this->ask("Terceira linha:");
			$url_logo		= $this->ask("URL do logo:");
			$moip->billet = true;
			$moip->expiration 	= $expiration;
			$moip->workingDays 	= $working_days;
			$moip->firstLine 	= $first_line;
			$moip->secondLine 	= $second_line;
			$moip->lastLine 	= $last_line;
			$moip->uriLogo 		= $url_logo;
		} else {
			$moip->billet = false;
		}
		$moip->save();
	}
}
