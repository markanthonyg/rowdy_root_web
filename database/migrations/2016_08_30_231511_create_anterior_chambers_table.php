<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnteriorChambersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anterior_chambers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid')->default(0);
			$table->integer('isACODNormal')->nullable()->default(0);
			$table->integer('isACOSNormal')->nullable()->default(0);
			$table->text('ACDepthOD', 65535)->nullable();
			$table->text('ACDepthOS', 65535)->nullable();
			$table->text('ACAngleOD', 65535)->nullable();
			$table->text('ACAngleOS', 65535)->nullable();
			$table->text('PASOD', 65535)->nullable();
			$table->text('PASOS', 65535)->nullable();
			$table->text('ACODKP', 65535)->nullable();
			$table->text('ACOSKP', 65535)->nullable();
			$table->integer('isShuntOD')->nullable()->default(0);
			$table->integer('isScarringOD')->nullable()->default(0);
			$table->integer('isTraumaOD')->nullable()->default(0);
			$table->integer('isBlebOD')->nullable()->default(0);
			$table->integer('isShuntOS')->nullable()->default(0);
			$table->integer('isScarringOS')->nullable()->default(0);
			$table->integer('isTraumaOS')->nullable()->default(0);
			$table->integer('isBlebOS')->nullable()->default(0);
			$table->integer('isVascularOD')->nullable()->default(0);
			$table->text('BlebOD_Num', 65535)->nullable();
			$table->integer('isVascularOS')->nullable()->default(0);
			$table->text('BlebOS_Num', 65535)->nullable();
			$table->integer('isKSpindleOD')->nullable()->default(0);
			$table->integer('isKSpindleOS')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('anterior_chambers');
	}

}
