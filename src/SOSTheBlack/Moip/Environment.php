<?php namespace Artesaos\Moip;

class Environment {
	/**
	 * base url
	 * 
	 * @var string
	 */
	public $base_url;

	/**
	 * name of environment, sandbox or production
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * __construct()
	 * 
	 * @param string $base_url 
	 * @param string $name 
	 * @return void
	 */
	function __construct($base_url = '', $name = '')
	{
		$this->base_url = $base_url;
		$this->name = $name;
	}
}