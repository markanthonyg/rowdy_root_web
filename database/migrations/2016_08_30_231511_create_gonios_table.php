<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGoniosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gonios', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid');
			$table->integer('isHxFHA')->nullable()->default(0);
			$table->binary('FHASide', 65535)->nullable();
			$table->integer('isODNormal')->nullable()->default(0);
			$table->text('odABCDNon', 65535)->nullable();
			$table->text('odABCDComp', 65535)->nullable();
			$table->integer('odDegreeNon')->nullable()->default(0);
			$table->integer('odDegreeComp')->nullable()->default(0);
			$table->text('odRSQNon', 65535)->nullable();
			$table->text('odRSQComp', 65535)->nullable();
			$table->text('odPigment', 65535)->nullable();
			$table->integer('isODAntPigLine')->nullable()->default(0);
			$table->integer('isOSNormal')->nullable()->default(0);
			$table->text('osABCDNon', 65535)->nullable();
			$table->text('osABCDComp', 65535)->nullable();
			$table->integer('osDegreeNon')->nullable()->default(0);
			$table->integer('osDegreeComp')->nullable()->default(0);
			$table->text('osRSQNon', 65535)->nullable();
			$table->text('osRSQComp', 65535)->nullable();
			$table->text('osPigment', 65535)->nullable();
			$table->integer('isOSAntPigLine')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gonios');
	}

}
