<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('username', 45)->nullable()->unique('`username_UNIQUE`');
			$table->string('password', 180)->nullable();
			$table->integer('distributor')->nullable();
			$table->integer('regno')->nullable();
			$table->string('name', 45)->nullable();
			$table->date('dob')->nullable();
			$table->string('address1', 200)->nullable();
			$table->string('address2', 200)->nullable();
			$table->integer('pin')->nullable();
			$table->integer('mobile')->nullable();
			$table->string('tel', 16)->nullable();
			$table->string('email', 200)->nullable();
			$table->integer('state_id')->nullable()->index('`fk_user_states1_idx`');
			$table->integer('city_id')->nullable()->index('`fk_user_states_cities1_idx`');
			$table->string('idproof', 200)->nullable();
			$table->string('prooftype', 45)->nullable();
			$table->string('nominee', 45)->nullable();
			$table->string('relationship', 45)->nullable();
			$table->string('nomaddress1', 200)->nullable();
			$table->string('nomaddress2', 200)->nullable();
			$table->date('logindate')->nullable();
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
		Schema::drop('user');
	}

}
