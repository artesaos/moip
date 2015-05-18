<?php namespace Artesaos\Moip;

/**
 * MoipInterface
 *
 * @package Artesaos\Moip
 * @author Jean Cesar Garcia <jeancesargarcia@gmail.com> <Artesaos>
 * @version 1.*
 **/
interface MoipInterface
{
	/**
	 * postOrder
	 * 
	 * @param string[] $order 
	 * @return \Artesaos\Moip\Moip\response
	 */
	public function postOrder(array $order);

	/**
	 * response 
	 * 
	 * @param type $send 
	 * @return string[]|Exception
	 */
	public function response($send = null);
}