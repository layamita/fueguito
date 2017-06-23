<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEcpmGeneralTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('ecpm_general', function(Blueprint $table)
		{
			$table->integer('ecpm_segments_id', true);
			$table->string('offer_id', 150)->index('offer_id');
			$table->integer('id_status')->index('id_status_2');
			$table->integer('id_type_vertical_traffic')->index('id_type_vertical_traffic');
			$table->string('country_code', 100);
			$table->string('os', 20);
			$table->string('os_version', 100);
			$table->string('connection_type', 100);
			$table->string('mobile_carrier', 250);
			$table->decimal('revenue_max_time', 10);
			$table->decimal('revenue_min_time', 10);
			$table->integer('visits_max_time');
			$table->integer('visits_min_time');
			$table->integer('conversions_max_time');
			$table->integer('conversions_min_time');
			$table->decimal('ecpm_max_time', 10, 4);
			$table->decimal('ecpm_min_time', 10, 4);
			$table->decimal('ecpm_total', 10, 4)->index('ecpm_total');
			$table->string('hash', 150)->index('hash');
			$table->integer('new')->index('new');
			$table->unique(['offer_id','country_code','os','os_version','connection_type','mobile_carrier'], 'segments');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('ecpm_general');
	}

}
