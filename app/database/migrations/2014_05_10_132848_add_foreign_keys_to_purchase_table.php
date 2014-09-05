<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPurchaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('purchase', function(Blueprint $table) {
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
		Schema::table('purchase', function(Blueprint $table) {
			$table->dropForeign('purchase_user_id_foreign');
		});
	}

}
