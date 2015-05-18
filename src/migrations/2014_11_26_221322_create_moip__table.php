<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoipTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moip', function($table){
			$table->increments('id');
			$table->string('receiver', 50)->default('jeancesargarcia@gmail.com')->comment('Identifica o usuário Moip que irá receber o pagamento no Moip');
			$table->string('key', 40)->default('ABABABABABABABABABABABABABABABABABABABAB');
			$table->string('token', 32)->default('01010101010101010101010101010101');
			$table->boolean('environment')->default(0)->comment('Método que define o ambiente em qual o requisição será processada. False: desenvolvimento, True: produção');
			$table->boolean('validate')->default(0)->comment('False: Basic, True: Identification');
			$table->string('reason')->default('Package Moip')->comment('Responsável por definir o motivo do pagamento');
			$table->string('expiration')->default(3)->comment('Data em formato AAAA-MM-DD ou quantidade de dias');
			$table->boolean('workingDays')->default(0)->comment('Caso expiration seja quantidade de dias você pode definir com true para que seja contado em dias úteis, o padrão será dias corridos');
			$table->string('firstLine')->comment('Mensagem adicionais a ser impresso no boleto');
			$table->string('secondLine')->comment('Mensagem adicionais a ser impresso no boleto');
			$table->string('lastLine')->comment('Mensagem adicionais a ser impresso no boleto');
			$table->string('uriLogo')->comment('URL de sua logomarca, dimenções máximas 75px largura por 40px altura');
			$table->string('url_return')->comment('definir a URL que o comprador será redirecionado ao finalizar um pagamento através do checkout Moip');
			$table->string('url_notification')->comment('responsável por definir a URL ao qual o Moip deverá notificar com o NASP');
			$table->boolean('billet')->default(1)->comment('Para disponibilizar a opção Boleto Bancário como forma de pagamento no checkout Moip');
			$table->boolean('financing')->default(1)->comment('Para disponibilizar a opção Financiamento como forma de pagamento no checkout Moip');
			$table->boolean('debit')->default(1)->comment('Para disponibilizar a opção Debito em conta como forma de pagamento no checkout Moip');
			$table->boolean('creditCard')->default(1)->comment('Para disponibilizar a opção Cartão de Crédito como forma de pagamento no checkout Moip');
			$table->boolean('debitCard')->default(1)->comment('Para disponibilizar a opção Cartão de débito como forma de pagamento no checkout Moip');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('moip');
	}
}
