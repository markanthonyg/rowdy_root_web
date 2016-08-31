<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistanceVisionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distance_visions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid')->default(0);
			$table->text('DVODSC', 65535)->nullable();
			$table->text('DVOSSC', 65535)->nullable();
			$table->text('DVODCC', 65535)->nullable();
			$table->text('DVOSCC', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('distance_visions');
	}

}
