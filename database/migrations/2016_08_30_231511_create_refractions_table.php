<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefractionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('refractions', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid');
			$table->integer('isManifest')->nullable()->default(0);
			$table->text('SC_OD_Sphere', 65535)->nullable();
			$table->text('SC_OD_Cyl', 65535)->nullable();
			$table->text('SC_OD_Axis', 65535)->nullable();
			$table->text('SC_OS_Sphere', 65535)->nullable();
			$table->text('SC_OS_Cyl', 65535)->nullable();
			$table->text('SC_OS_Axis', 65535)->nullable();
			$table->text('CC_OD_Sphere', 65535)->nullable();
			$table->text('CC_OD_Cyl', 65535)->nullable();
			$table->text('CC_OD_Axis', 65535)->nullable();
			$table->text('CC_OS_Sphere', 65535)->nullable();
			$table->text('CC_OS_Cyl', 65535)->nullable();
			$table->text('CC_OS_Axis', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('refractions');
	}

}
