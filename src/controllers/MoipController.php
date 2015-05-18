<?php namespace Artesaos\Moip\Controllers;

use View;
use Moip;
use Input;
use Config;
use MoipApi;
use Session;
use BaseController;

class MoipController extends BaseController
{
	/**
	 * data of configuration of the MoIP
	 *
	 * @var []
	 **/

	private $moip;

	/**
	 * array
	 *
	 * @var []
	 **/

	private $data = [
		"Forma" 		=> "",
		"Instituicao" 	=> "",
	    "Parcelas"		=> "",
	    "CartaoCredito" => [
	        "Numero" 		 => "",
	        "Expiracao" 	 => "",
	        "Cofre"			 => "",
	        "CodigoSeguranca"=> "",
	        "Portador" 		 => [
	        	"Nome" 			=> "",
	            "DataNascimento"=> "",
	            "Telefone" 		=> "",
	            "Identidade" 	=> ""
	        ]
	    ]
	];

	/**
	 * callback do js de pagamento do moip
	 *
	 * @var array
	 **/
	protected $response;

	/**
	 * response
	 * Recebe o callback do js de pagamento do moip
	 * e grava os dados em uma session
	 * 
	 * @return type
	 */
	public function response()
	{
		$this->response = Input::all();
		Session::put(Config::get('artesaos::moip.array_session').'.callback', $this->response['moip']);
		return $this->response;
	}

	/**
	 * initialize
	 * 
	 * @return void
	 */
	private function initialize(array $data, $token)
	{
		$this->moip = Moip::firstOrFail();
		$this->data = array_replace_recursive($this->data, $data);
		if (empty($this->data['CartaoCredito']['Cofre'])) {
			unset($this->data['CartaoCredito']['Cofre']);
		}
		$this->data['token'] 		= $this->token($token);
		$this->data['environment'] 	= $this->environment();
	}

	/**
	 * token
	 * Define o token que será pago
	 * 
	 * @param  string $token
	 * @return string
	 */
	private function token($token)
	{
		return $token ? $token : Session::get('pagamento.response.token');
	}

	/**
	 * transparent
	 * 
	 * @param array $data 
	 * @param string $token
	 * @return Illuminate\View\Factory
	 */
	public function transparent(array $data, $token = null)
	{
		$this->initialize($data, $token);
		return View::make('artesaos::moip')->withMoip($this->data);
	}

	/**
	 * environment
	 * 
	 * @return string
	 */
	private function environment()
	{
		$environment = "";

		if ((boolean) $this->moip->environment === true) {
			$environment = "https://www.moip.com.br/transparente/MoipWidget-v2.js";
		} else {
			$environment = "https://desenvolvedor.moip.com.br/sandbox/transparente/MoipWidget-v2.js";
		}

		return $environment;
	}
}