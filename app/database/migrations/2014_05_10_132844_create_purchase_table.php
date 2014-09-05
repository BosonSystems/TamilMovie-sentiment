<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase', function(Blueprint $table) {
			$table->integer('id', true);
			$table->integer('user_id')->index('`fk_purchase_user1_idx`');
			$table->integer('product_id')->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->float('dprice', 10, 0)->nullable();
			$table->dateTime('create_time')->nullable();
			$table->timestamp('update_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase');
	}

}
