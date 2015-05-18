<?php namespace Artesaos\Moip;

use App;
use Config;
use Session;
use Exception;

/**
 * Moip's API abstraction class
 *
 * Class to use for all abstraction of Moip's API
 * @package Artesaos\Moip
 * @author Jean Cesar Garcia <jeancesargarcia@gmail.com> <Artesaos>
 * @version 1.*
 * @license <a href="http://www.opensource.org/licenses/bsd-license.php">BSD License</a>
 **/
class Moip extends MoipAbstract implements MoipInterface
{
	/**
	 * Retorno da API
	 *
	 * @var object
	 **/
	private $response;

	/**
	 * postOrder
	 * 
	 * @param string[] $order 
	 * @return \Artesaos\Moip\Moip\response
	 */
	public function postOrder(array $order)
	{
		$this->setData($order);
		$this->initialize();
		$this->getParcel();
		$this->billetConf();
		$this->getMessage();
		$this->getComission();
		$this->getPaymentWay();
		$this->api->setReason($this->getReason());
		$this->api->setUniqueID($this->getUniqueId());
		$this->api->setPayer($this->getParams('payer'));
		$this->api->setValue($this->data['prices']['value']);
		$this->api->setAdds($this->getParams('prices', 'adds'));
		$this->api->setDeduct($this->getParams('prices','deduct'));
		$this->api->setReceiver($this->getParams('receiver', null, true));
		$this->api->setReturnURL($this->getParams('url_return', null, true));
		$this->api->setNotificationURL($this->getParams('url_notification', null, true));
		$this->api->validate($this->getValidate());
		return $this->response($this->api->send());
	}

	/**
	 * response
	 * 
	 * @param type $send 
	 * @return string[]
	 */
	public function response($send = null)
	{
		if ($send) {
			$answer = $this->api->getAnswer();
			$this->responseValidation($send, $answer);
			$this->response 			= App::make('stdClass');
			$this->response->getXML 	= $this->api->getXML();
			$this->response->replyXML 	= $send->xml;
			$this->response->token 		= $answer->token;
			$this->response->url 		= $answer->payment_url;
		}

		Session::put(Config::get('artesaos::moip.array_session').'.response', (array) $this->response);
		return $this->response;
	}

	/**
	 * parcel
	 * 
	 * Generete parcel
	 * 
	 * @param  array  $parcel
	 * @return array
	 */
	public function parcel(array $parcel)
	{
		$query = $this->api->queryParcel(
			$parcel['login'],
			$parcel['maxParcel'],
			$parcel['rate'],
			$parcel['simulatedValue']
		);

		if ($query['response'] !== true) {
			throw new Exception('Error: Não foi possível gerar query');
		}

		return $query['installment'];
	}
}