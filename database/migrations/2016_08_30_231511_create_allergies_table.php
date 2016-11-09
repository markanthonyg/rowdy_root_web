<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAllergiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('allergies', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pid');
			$table->text('allergy', 65535);
			$table->text('severity', 65535)->nullable();
			$table->text('adverse_reaction', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('allergies');
	}

}
