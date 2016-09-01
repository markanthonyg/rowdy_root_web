<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHealthHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('health_history', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pid');
			$table->text('pc', 65535);
			$table->text('da', 65535);
			$table->text('bt', 65535);
			$table->text('pmh', 65535);
			$table->text('psh', 65535);
			$table->text('fh', 65535);
			$table->integer('law')->default(0);
			$table->text('pe', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('health_history');
	}

}
