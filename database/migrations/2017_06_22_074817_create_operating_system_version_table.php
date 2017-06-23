<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOperatingSystemVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('operating_system_version', function(Blueprint $table)
		{
			$table->integer('id_os_version', true);
			$table->integer('id_os')->nullable()->index('id_os');
			$table->string('os', 20);
			$table->string('version', 200);
			$table->unique(['os','version'], 'os');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('operating_system_version');
	}

}
