<?php namespace Artesaos\Moip;

/**
 * Read-only response
 * @property boolean|string $response
 * @property string $error
 * @property string $xml
 * @property string $payment_url
 * @property string $token
 */
class Response {

	/**
	 * [$response description]
	 * @var [type]
	 */
	private $response;

	/**
	 * __construct
	 * 
	 * @param string[]
	 * @return void
	 */
	function __construct(array $response)
	{
		$this->response = $response;
	}

	/**
	 * __get
	 * 
	 * @param string $name 
	 * @return null
	 */
	function __get($name)
	{
		if (isset($this->response[$name]))
		{
			return $this->response[$name];
		}
		return null;
	}
}