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
		Schema::dropIfExists('moip');
		Schema::create('moip', function(Blueprint $table) {
			$table->increments('id');
			$table->string('token', 32)->coment('Token de acesso');
			$table->string('key', 40)->comment('Chave de acesso');
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
