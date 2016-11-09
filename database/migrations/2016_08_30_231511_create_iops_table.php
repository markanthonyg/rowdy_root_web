<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iops', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('vid');
			$table->text('ODValue', 65535)->nullable();
			$table->text('ODType', 65535)->nullable();
			$table->text('ODNotes', 65535)->nullable();
			$table->text('OSValue', 65535)->nullable();
			$table->text('OSType', 65535)->nullable();
			$table->text('OSNotes', 65535)->nullable();
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
		Schema::drop('iops');
	}

}
