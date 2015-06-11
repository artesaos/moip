<?php namespace Artesaos\Moip;

# Illuminate
use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;

# Artesaos
use Artesaos\Moip\Repositories\Moip\MoipEloquent;

/**
 * Responsible class by integration methods
 * 
 * @package Artesaos\Moip
 * @author Jean C. Garcia <jeancesargarcia@gmail.com>
 * @version 2.0.0
 */
class Moip
{
	/**
	 * The table associated with the Moip model.
	 *
	 * @var Artesaos\Moip\Repositories\Moip\MoipEloquent
	 **/
	private $moip_data;

    /**
     * The IoC
     * 
     * @var Illuminate\Container\Container
     */
    protected $app;

	/**
	 * Initialize class
	 */
	public function __construct(Application $app) 
	{
		$this->app       = $app;
		$this->moip_data = $this->app->make(MoipEloquent::class);
	}
}