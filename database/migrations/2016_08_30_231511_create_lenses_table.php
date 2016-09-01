<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lenses', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid');
			$table->text('NS_OD', 65535)->nullable();
			$table->text('NS_OD_Notes', 65535)->nullable();
			$table->text('NS_OS', 65535)->nullable();
			$table->text('NS_OS_Notes', 65535)->nullable();
			$table->integer('isStableLensOD')->nullable()->default(0);
			$table->integer('isStableLensOS')->nullable()->default(0);
			$table->integer('isPseudophakia_OD')->nullable()->default(0);
			$table->integer('isPseudophakia_OS')->nullable()->default(0);
			$table->integer('isPCO_OD')->nullable()->default(0);
			$table->integer('isPCO_OS')->nullable()->default(0);
			$table->text('Coritcal_OD', 65535)->nullable();
			$table->text('Cortical_OD_Notes', 65535)->nullable();
			$table->text('Coritcal_OS', 65535)->nullable();
			$table->text('Cortical_OS_Notes', 65535)->nullable();
			$table->text('PSC_OD', 65535)->nullable();
			$table->text('PSC_OD_Notes', 65535)->nullable();
			$table->text('PSC_OS', 65535)->nullable();
			$table->text('PSC_OS_Notes', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lenses');
	}

}
