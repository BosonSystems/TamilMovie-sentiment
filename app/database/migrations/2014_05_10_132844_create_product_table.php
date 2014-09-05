<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product', function(Blueprint $table) {
			$table->integer('id')->nullable();
			$table->string('name', 80)->nullable();
			$table->float('mrp', 10, 0)->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->float('dprice', 10, 0)->nullable();
			$table->integer('qty')->nullable();
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
		Schema::drop('product');
	}

}
