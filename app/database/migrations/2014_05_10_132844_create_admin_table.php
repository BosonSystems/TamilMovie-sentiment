<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table) {
			$table->integer('id', true);
			$table->string('username', 16);
			$table->string('email')->nullable();
			$table->string('password', 32);
			$table->string('name', 45)->nullable();
			$table->string('type', 45)->nullable();
			$table->binary('status', 1)->nullable()->default(1);
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
		Schema::drop('admin');
	}

}
