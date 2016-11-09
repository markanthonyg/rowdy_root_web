<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGlassesRxsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('glasses_rxs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid');
			$table->text('OD_Sphere', 65535)->nullable();
			$table->text('OD_Cyl', 65535)->nullable();
			$table->text('OD_Axis', 65535)->nullable();
			$table->text('OD_Add', 65535)->nullable();
			$table->text('OS_Sphere', 65535)->nullable();
			$table->text('OS_Cyl', 65535)->nullable();
			$table->text('OS_Axis', 65535)->nullable();
			$table->text('OS_Add', 65535)->nullable();
			$table->text('GlassesRxNotes', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('glasses_rxs');
	}

}
