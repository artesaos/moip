<?php

use Illuminate\Database\Migrations\Migration;

class CreateMoipCancellationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moip_cancellation', function($table) {
			$table->increments('id');
			$table->string('classification', 100)->nullable()->comment('Título do motivo do cancelamento');
			$table->mediumText('description')->nullable();
			$table->mediumText('message')->nullable()->comment('Sugestão de mensagem ao comprador');
			$table->string('recovery', 50)->nullable()->comment('Oportunidade de Recuperação');
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
		Schema::drop('moip_cancellation');
	}

}
