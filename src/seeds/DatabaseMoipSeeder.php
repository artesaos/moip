<?php

use Illuminate\Database\Seeder;

class DatabaseMoipSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('MoipCancellationTableSeeder');
	}

}
