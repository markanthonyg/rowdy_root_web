<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePupilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pupils', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid')->default(0);
			$table->integer('isBothPupilsNormal')->nullable()->default(0);
			$table->text('bothShape', 65535)->nullable();
			$table->text('bothDiameter', 65535)->nullable();
			$table->integer('isBothRAPD')->nullable()->default(0);
			$table->integer('isBothSynechia')->nullable()->default(0);
			$table->integer('isRightPupilNormal')->nullable()->default(0);
			$table->text('rightShape', 65535)->nullable();
			$table->text('rightDiameter', 65535)->nullable();
			$table->integer('isRightRAPD')->nullable()->default(0);
			$table->integer('isRightSynechia')->nullable()->default(0);
			$table->integer('isLeftPupilNormal')->nullable()->default(0);
			$table->text('leftShape', 65535)->nullable();
			$table->text('leftDiameter', 65535)->nullable();
			$table->integer('isLeftRAPD')->nullable()->default(0);
			$table->integer('isLeftSynechia')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pupils');
	}

}
