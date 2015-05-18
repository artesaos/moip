<?php 

return [

	/*
	|--------------------------------------------------------------------------
	| Nome da chave da sessão
	|--------------------------------------------------------------------------
	|
	| Nome da chave que ficará armazenado os dados referente ao package MoIP
	| Dentro desse array poderá conter outros dois principais arrays:
	| response: Irá conter dados referente ao checkout
	| callback: Irá conter dados referent ao checkout transparente
	|
	*/

	'array_session' => 'pagamento',

	/*
	|--------------------------------------------------------------------------
	| URL do Checkout Transparente
	|--------------------------------------------------------------------------
	|
	| URL que será utilizada para realizar o pagamento pelo java script de
	| pagamento do moip.
	|
	*/

	'url' => '/artesaos/moip'
];