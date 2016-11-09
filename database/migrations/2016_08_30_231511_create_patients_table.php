<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('unidentified_patient');
			$table->text('first_name', 65535);
			$table->text('middle', 65535);
			$table->text('last_name', 65535);
			$table->text('gender', 65535);
			$table->integer('birth_day')->default(0);
			$table->text('birth_month', 65535);
			$table->integer('birth_year')->default(0);
			$table->integer('estimated_birth_years')->default(0);
			$table->integer('estimated_birth_months')->default(0);
			$table->text('address', 65535);
			$table->text('address_2', 65535);
			$table->text('city_village', 65535);
			$table->text('state_province', 65535);
			$table->text('country', 65535);
			$table->text('postal_code', 65535);
			$table->text('phone_number', 65535);
			$table->text('pic_path', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('patients');
	}

}
