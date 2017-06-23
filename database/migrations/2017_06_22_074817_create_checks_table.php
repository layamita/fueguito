<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChecksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('checks', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('ckey', 20)->nullable()->unique('key_UNIQUE');
			$table->string('description')->nullable();
			$table->string('result')->nullable();
			$table->boolean('simple_result')->nullable();
			$table->integer('goods')->nullable();
			$table->integer('bads')->nullable();
			$table->dateTime('last_check')->nullable();
			$table->dateTime('last_good')->nullable();
			$table->dateTime('last_bad')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('checks');
	}

}
