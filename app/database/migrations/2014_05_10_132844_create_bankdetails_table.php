<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBankdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bankdetails', function(Blueprint $table) {
			$table->integer('id')->primary();
			$table->integer('user_id')->index('`fk_bankdetails_user1_idx`');
			$table->string('bankname', 45)->nullable();
			$table->string('accno', 20)->nullable();
			$table->string('code', 20)->nullable();
			$table->binary('status', 1)->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bankdetails');
	}

}
