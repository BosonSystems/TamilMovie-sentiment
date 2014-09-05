<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToBankdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('bankdetails', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('user');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('bankdetails', function(Blueprint $table) {
			$table->dropForeign('bankdetails_user_id_foreign');
		});
	}

}
