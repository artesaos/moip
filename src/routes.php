<?php 

/**
 * Rota que irá processar os pagamentos
 */

Route::post(Config::get('artesaos::moip.url'), [
	'as'	=> 'artesaos.moip',
	'uses'	=> 'Artesaos\Moip\Controllers\MoipController@response'
]);