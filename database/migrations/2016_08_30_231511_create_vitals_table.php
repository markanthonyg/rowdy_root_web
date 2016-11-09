<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVitalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vitals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pid');
			$table->float('bps', 10, 0)->nullable()->default(0);
			$table->float('bpd', 10, 0)->nullable()->default(0);
			$table->float('bpunit', 10, 0)->nullable()->default(0);
			$table->float('fasting', 10, 0)->nullable()->default(0);
			$table->float('bg', 10, 0)->nullable()->default(0);
			$table->text('bgUnit', 65535)->nullable();
			$table->float('o2sat', 10, 0)->nullable()->default(0);
			$table->float('hb', 10, 0)->nullable()->default(0);
			$table->integer('hfeet')->nullable()->default(0);
			$table->integer('hinches')->nullable()->default(0);
			$table->integer('hcm')->nullable()->default(0);
			$table->text('hunit', 65535)->nullable();
			$table->float('weight', 10, 0)->nullable()->default(0);
			$table->text('wunit', 65535)->nullable();
			$table->text('notes', 65535)->nullable();
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
		Schema::drop('vitals');
	}

}
