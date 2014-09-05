<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transaction', function(Blueprint $table) {
			$table->integer('id');
			$table->integer('user_id')->index('`fk_transaction_user1_idx`');
			$table->integer('bankdetails_id')->index('`fk_transaction_bankdetails1_idx`');
			$table->integer('amount')->nullable();
			$table->binary('transtype', 1)->nullable();
			$table->boolean('mode')->nullable();
			$table->boolean('status')->nullable();
			$table->dateTime('created_time')->nullable();
			$table->timestamp('updated_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->primary(['id','user_id','bankdetails_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transaction');
	}

}
