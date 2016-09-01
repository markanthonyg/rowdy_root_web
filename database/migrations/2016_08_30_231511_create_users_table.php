<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->text('username', 65535);
			$table->text('password', 65535);
			$table->text('email', 65535);
			$table->text('first_name', 65535);
			$table->text('middle_name', 65535)->nullable();
			$table->text('last_name', 65535);
			$table->enum('gender', array('male','female','other'));
			$table->date('dob')->nullable();
			$table->enum('role', array('sys_admin','clinic_admin','emp'));
			$table->timestamp('dateCreated')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('remember_token', 100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
