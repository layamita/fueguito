<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitsSpecificGeneralTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('visits_specific_general', function(Blueprint $table)
		{
			$table->integer('visit_id', true);
			$table->string('country_code', 100);
			$table->string('traffic_source_id', 150);
			$table->string('os_version', 100);
			$table->string('connection_type', 100);
			$table->string('mobile_carrier', 250);
			$table->integer('total');
			$table->unique(['country_code','traffic_source_id','os_version','connection_type','mobile_carrier'], 'country_code');
			$table->index(['country_code','os_version','connection_type','mobile_carrier','traffic_source_id'], 'campaign_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('visits_specific_general');
	}

}
