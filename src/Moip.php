<?php namespace Artesaos\Moip;

# Aliases
use App;

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
	 * @var string
	 **/
	private $moip_db;

	/**
	 * Initialize class
	 */
	public function __construct() {
		$this->moip_db = App::make('Artesaos\Moip\Model\Moip');
	}
}