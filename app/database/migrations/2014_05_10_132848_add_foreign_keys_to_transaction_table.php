<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transaction', function(Blueprint $table) {
			$table->foreign('bankdetails_id')->references('id')->on('bankdetails');
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
		Schema::table('transaction', function(Blueprint $table) {
			$table->dropForeign('transaction_bankdetails_id_foreign');
			$table->dropForeign('transaction_user_id_foreign');
		});
	}

}
