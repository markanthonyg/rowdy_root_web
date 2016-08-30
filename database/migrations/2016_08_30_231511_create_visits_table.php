<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visits', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pid')->default(0);
			$table->text('chiefComplaint', 65535)->nullable();
			$table->text('assessment', 65535)->nullable();
			$table->text('plan', 65535)->nullable();
			$table->timestamp('dateCreated')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visits');
	}

}
