<?php

namespace Artesaos\Moip;

use Illuminate\Contracts\Foundation\Application;
use Moip\Moip as M;
use Moip\MoipBasicAuth;

class Moip
{
	/**
	 * The Laravel Application.
	 *
	 * @var \Illuminate\Contracts\Foundation\Application
	 **/
	private $app;

	/**
	 * Class Moip sdk.
	 *
	 * @var \Moip\Moip
	 **/
	private $moip;

	/**
	 * Class constructor.
	 * 
	 * @param \Illuminate\Contracts\Foundation\Application $app The Laravel Application.
	 */
	public function __construct(Application $app) 
	{
		$this->app = $app;
		$this->moip = $this->app->make(M::class, [$this->app->make(MoipBasicAuth::class, [config('moip.credentials.token'), config('moip.credentials.key')]), $this->getHomologated()]);
	}

	/**
	 * Get endpoint of request.
	 * 
	 * @return \Moip\Moip::ENDPOINT_PRODUCTION|\Moip\Moip::ENDPOINT_SANDBOX
	 */
	private function getHomologated()
	{
		return config('moip.homologated') === true ? M::ENDPOINT_PRODUCTION : M::ENDPOINT_SANDBOX;
	}
}
