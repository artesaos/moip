<?php namespace Artesaos\Moip;

use App;
use Moip;
use Exception;

/**
 * MoipAbstract
 *
 * @package Artesaos\Moip
 * @author Jean Cesar Garcia <jeancesargarcia@gmail.com> <Artesaos>
 * @version 1.*
 **/
abstract class MoipAbstract
{
	/**
	 * Api of MoIP
	 *
	 * @var \Artesaos\Moip\Api
	 **/
	protected $api;

	/**
	 * data of configuration of the MoIP
	 *
	 * @var array table moip
	 **/
	protected $moip;
	
	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $data;

	/**
	* initialize()
	*
	* @return \Artesaos\Moip\Api
	*/
	protected function initialize()
	{
		$this->moip = Moip::first();
		$this->api  = App::make('\Artesaos\Moip\Api');
		$this->api->setEnvironment(! $this->moip->environment);
		$this->api->setCredential([
		    'key' 	=> $this->moip->key,
		    'token' => $this->moip->token
		]);
		return $this->api;
	}

	/**
	 * setData()
	 * 
	 * @param string[] $data
	 * @return void
	 */
	protected function setData($data)
	{
		$this->data = $data;
	}	

	/**
	 * getValidate()
	 * 
	 * @return string
	 */
	protected function getValidate()
	{
		return $this->moip->validate === 0 ? 'Basic' : 'Identification';
	}

	/**
	 * getUniqueId()
	 * 
	 * adds unique id in the order
	 * 
	 * @return string|false
	 */
	protected function getUniqueId()
	{
		return isset($this->data['unique_id']) ? $this->data['unique_id'] : false;
	}

	/**
	 * getReason()
	 * 
	 * adds payment reason in the order
	 * 
	 * @return string
	 */
	protected function getReason()
	{
		return isset($this->data['reason']) ? $this->data['reason'] : $this->moip->reason;
	}

	/**
	 * getParams
	 * 
	 * Validation of the params sent
	 * 
	 * @param string $oneParam 
	 * @param string $twoParam 
	 * @param boolean $db 
	 * @return string
	 */
	protected function getParams($oneParam, $twoParam = null, $db = false)
	{
		if (! $twoParam) {
			if ($db === true) {
				return isset($this->data[$oneParam]) ? $this->data[$oneParam] : $this->moip->$oneParam;
			} else {
				return isset($this->data[$oneParam]) ? $this->data[$oneParam] : '';
			}
		} else {
			return isset($this->data[$oneParam][$twoParam]) ? $this->data[$oneParam][$twoParam] : '';
		}
	}

	/**
	 * billetConf
	 * @return void
	 */
	protected function billetConf()
	{
		$this->api->setBilletConf(
			$this->getParams('billet', 'expiration', true),
			(boolean) $this->getParams('billet', 'workingDays', true),
			$this->getBilletInstructions(),
			$this->getParams('billet', 'uriLogo', true)
		);
	}

	/**
	 * getBilletInstructions
	 * 
	 * @return string[]
	 */
	private function getBilletInstructions()
	{
		$billet = [
	    	'instructions' => [
	    		'firstLine',
				'secondLine',
				'lastLine'
	    	]
		];
		
		foreach ($billet['instructions'] as $keyInstructions => $valueInstructions) {
			$billet['instructions'][$keyInstructions] =
				isset($this->data['billet']['instructions'][$keyInstructions]) ? 
				$this->data['billet']['instructions'][$keyInstructions] :
				$this->moip->$valueInstructions;
		}
		
		return $billet['instructions'];
	}

	/**
	 * getPaymentWay
	 * 
	 * Adds payment way in the order
	 * 
	 * @return false|null
	 */
	protected function getPaymentWay()
	{
		if (! isset($this->data['paymentWay'])) {
			return false;
		} else {
			$payment  = $this->data['paymentWay'];
			$arrayWay = [
				'creditCard',
		    	'billet'	,
		    	'financing'	,
		    	'debit'		,
		    	'debitCard'	
		    ];

			foreach ($arrayWay as $arrayWayKey => $arrayWayValue) {
				if (isset($payment[$arrayWayKey]) && $payment[$arrayWayKey] == $arrayWayValue) {
					$this->api->addPaymentWay($arrayWayValue);
				} else {
					if ($this->moip->$arrayWayValue === 1) {
						$this->api->addPaymentWay($arrayWayValue);
					}
				}
			}
		}
	}

	/**
	 * getMessage
	 * 
	 * @return void
	 */
	protected function getMessage()
	{
		if (isset($this->data['message'])) {
			foreach ($this->data['message'] as $keyMessage => $valueMessage) {
				$this->api->addMessage($valueMessage);
			}
		}
	}

	/**
	 * getComission
	 * 
	 * @return void
	 */
	protected function getComission()
	{
		if (isset($this->data['comission'])) {
			//dd($this->data['comission']);
			foreach ($this->data['comission'] as $keyComission => $valueComission) {
				$this->api->addComission(
					isset($valueComission['reason']) 			? $valueComission['reason'] 		 : null,
					isset($valueComission['receiver']) 			? $valueComission['receiver'] 		 : null,
					isset($valueComission['value']) 			? $valueComission['value'] 			 : null,
					isset($valueComission['percentageValue']) 	? $valueComission['percentageValue'] : null,
					isset($valueComission['ratePayer']) 		? $valueComission['ratePayer'] 		 : null
				);
			}
		}
	}

	/**
	 * getParcel
	 * 
	 * @return void
	 */
	protected function getParcel()
	{
		if (isset($this->data['parcel'])) {
			foreach ($this->data['parcel'] as $keyParcel => $valueParcel) {
				$this->api->addParcel(
					isset($valueParcel['min']) 		? $valueParcel['min'] 		: null,
					isset($valueParcel['max']) 		? $valueParcel['max'] 		: null,
					isset($valueParcel['rate']) 	? $valueParcel['rate'] 		: null,
					isset($valueParcel['transfer']) ? $valueParcel['transfer'] 	: false,
					isset($valueParcel['receipt']) ? $valueParcel['receipt'] 	: false
				);
			}
		}
	}

	/**
	 * responseValidation
	 * 
	 * @param  array $send
	 * @param  array|string $answer
	 * @return void
	 */
	protected function responseValidation($send, $answer)
	{
		if ($send->error != false) {
			throw new Exception($send->error);
		} elseif (is_string($answer)) {
			throw new Exception($answer);
		} elseif ($answer->error !== false) {
			throw new Exception($answer->error);
		}
	}
}