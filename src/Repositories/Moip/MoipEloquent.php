<?php namespace Artesaos\Moip\Repositories\Moip;

# Package Artesaos\Moip
use Artesaos\Moip\Model\Moip;

/**
 * Eloquent repository for Moip model
 *
 * @package Artesaos\Moip
 * @author Jean C. Garcia <jeancesargarcia@gmail.com>
 * @version 2.0.0
 **/
class MoipEloquent
{
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 **/
	private $model;

	/**
	 * Create a new Eloquent model instance.
	 * 
	 * @return  void
	 */
	function __construct() 
	{
		$this->model = with(Moip::class);

		return $this;
	}

	/**
	 * Dynamically create members and methods
	 * 
	 * @param  string $method 
	 * @param  array $args   
	 * @return call_user_func_array
	 */
	public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }
}