<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFundusExamsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fundus_exams', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid');
			$table->integer('isDialated')->nullable()->default(0);
			$table->text('dialNotes', 65535)->nullable();
			$table->integer('isCDODAb')->nullable()->default(0);
			$table->text('CDOD', 65535)->nullable();
			$table->text('CDODNotes', 65535)->nullable();
			$table->integer('isCDOSAb')->nullable()->default(0);
			$table->text('CDOS', 65535)->nullable();
			$table->text('CDOSNotes', 65535)->nullable();
			$table->integer('isRetinaODAb')->nullable()->default(0);
			$table->text('RetinaODNotes', 65535)->nullable();
			$table->integer('isRetinaOSAb')->nullable()->default(0);
			$table->text('RetinaOSNotes', 65535)->nullable();
			$table->integer('isMaculaODAb')->nullable()->default(0);
			$table->text('MaculaODNotes', 65535)->nullable();
			$table->integer('isMaculaOSAb')->nullable()->default(0);
			$table->text('MaculaOSNotes', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fundus_exams');
	}

}
