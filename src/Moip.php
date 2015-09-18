<?php

namespace Artesaos\Moip;

use Illuminate\Contracts\Foundation\Application;

class Moip
{
	/**
	 * The Laravel Application.
	 *
	 * @var \Illuminate\Contracts\Foundation\Application
	 **/
	private $app;

	/**
	 * Class constructor.
	 * 
	 * @param \Illuminate\Contracts\Foundation\Application $app The Laravel Application.
	 */
	public function __construct(Application $app) 
	{
		$this->app = $app;
	}
}
