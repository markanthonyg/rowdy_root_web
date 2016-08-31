<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGonioSketchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gonio_sketches', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid')->default(0);
			$table->binary('image', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gonio_sketches');
	}

}
