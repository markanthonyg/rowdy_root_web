<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurgeriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surgeries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pid')->default(0);
			$table->text('title', 65535);
			$table->text('body', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('surgeries');
	}

}
