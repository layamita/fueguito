<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversionsMaxTimeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('conversions_max_time', function(Blueprint $table)
		{
			$table->bigInteger('conversion_id', true);
			$table->timestamp('postback_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'))->index('postback_timestamp');
			$table->dateTime('visit_timestamp')->nullable();
			$table->string('external_id', 150);
			$table->string('click_id', 150)->unique('click_id');
			$table->decimal('revenue', 10);
			$table->decimal('cost', 10);
			$table->string('campaign_id', 150);
			$table->string('offer_id', 150);
			$table->string('country_name', 150);
			$table->string('country_code', 100);
			$table->string('traffic_source_id', 150);
			$table->string('device', 100);
			$table->string('os', 100);
			$table->string('os_version', 100);
			$table->string('brand', 100);
			$table->string('model', 100);
			$table->string('browser', 200);
			$table->string('browser_version', 100);
			$table->string('isp', 250);
			$table->string('connection_type', 100);
			$table->string('ip', 100);
			$table->string('mobile_carrier', 150);
			$table->integer('ecpm_global')->default(0)->index('ecpm_global');
			$table->string('transaction_id', 25)->index('transaction_id');
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
		Schema::connection('gollum')->drop('conversions_max_time');
	}

}
