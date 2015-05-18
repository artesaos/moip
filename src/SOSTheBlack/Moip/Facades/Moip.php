<?php namespace Artesaos\Moip\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

/**
 * Facade
 * 
 * @author Jean Cesar Garcia <jeancesargarcia@gmail.com>
 * @version v1.*
 * @license <a href="http://www.opensource.org/licenses/bsd-license.php">BSD License</a>
 */
class Moip extends BaseFacade
{
	/**
	 * getFacadeAccessor()
	 * 
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'moip';
	}
}