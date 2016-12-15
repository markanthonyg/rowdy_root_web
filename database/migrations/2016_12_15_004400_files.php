<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Files extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('pid');
            $table->string('file_name', 255);
            $table->timestamp('uploaded')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
		});
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
    }
}
