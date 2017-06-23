<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVisitsLastTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('visits_last', function(Blueprint $table)
		{
			$table->integer('visit_id', true);
			$table->dateTime('timestamp')->index('timestamp');
			$table->string('external_id', 150);
			$table->string('click_id', 150);
			$table->string('campaign_id', 150);
			$table->string('offer_id', 150)->index('offer_id');
			$table->string('country_name', 150)->nullable();
			$table->string('country_code', 100)->nullable();
			$table->string('traffic_source_id', 150)->nullable();
			$table->string('device', 100)->nullable();
			$table->string('os', 100)->nullable();
			$table->string('os_version', 100)->nullable();
			$table->string('brand', 100)->nullable();
			$table->string('model', 100)->nullable();
			$table->string('browser', 200)->nullable();
			$table->string('browser_version', 100)->nullable();
			$table->string('isp', 250)->nullable();
			$table->string('connection_type', 100)->nullable();
			$table->string('ip', 100)->nullable();
			$table->string('mobile_carrier', 150)->nullable();
			$table->string('transaction_id', 25)->nullable()->index('transaction_id');
			$table->index(['campaign_id','offer_id','country_code','os','os_version','connection_type','mobile_carrier','traffic_source_id'], 'campaign_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('visits_last');
	}

}
