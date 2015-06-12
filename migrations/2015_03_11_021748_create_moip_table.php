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
		Schema::create('moip', function(Blueprint $table) {
			$table->increments('id');
			$table->string('token', 32)->comment('Access token');
			$table->string('key', 40)->comment('Passkey');
			$table->boolean('environment')
				->default(0)
				->comment('Development environment. 0 to 1 to sandbox and production');
			$table->timestamps();
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
