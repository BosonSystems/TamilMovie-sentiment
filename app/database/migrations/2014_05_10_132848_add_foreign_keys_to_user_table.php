<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user', function(Blueprint $table) {
			$table->foreign('state_id')->references('state_id')->on('states');
			$table->foreign('city_id')->references('city_id')->on('states_cities');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user', function(Blueprint $table) {
			$table->dropForeign('user_state_id_foreign');
			$table->dropForeign('user_city_id_foreign');
		});
	}

}
