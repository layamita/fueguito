<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOperatingSystemVersionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->table('operating_system_version', function(Blueprint $table)
		{
			$table->foreign('id_os', 'operating_system_version_ibfk_1')->references('id_os')->on('operating_system')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->table('operating_system_version', function(Blueprint $table)
		{
			$table->dropForeign('operating_system_version_ibfk_1');
		});
	}

}
