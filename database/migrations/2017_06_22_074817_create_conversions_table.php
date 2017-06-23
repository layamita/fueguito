<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConversionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('conversions', function(Blueprint $table)
		{
			$table->bigInteger('conversion_id', true);
			$table->timestamp('postback_timestamp')->default(DB::raw('CURRENT_TIMESTAMP'))->index('postback_timestamp');
			$table->dateTime('visit_timestamp')->nullable();
			$table->string('external_id', 150);
			$table->string('click_id', 150)->unique('click_id');
			$table->decimal('revenue', 10, 4);
			$table->decimal('cost', 10, 4);
			$table->string('campaign_id', 40);
			$table->string('offer_id', 40);
			$table->string('country_name', 50);
			$table->string('country_code', 2);
			$table->string('traffic_source_id', 40);
			$table->string('device', 15);
			$table->string('os', 30);
			$table->string('os_version', 30);
			$table->string('brand', 50);
			$table->string('model', 100);
			$table->string('browser', 200);
			$table->string('browser_version', 200);
			$table->string('isp', 200);
			$table->string('connection_type', 100);
			$table->string('ip', 20);
			$table->string('mobile_carrier', 50);
			$table->integer('ecpm_global')->default(0)->index('ecpm_global');
			$table->string('transaction_id', 25)->index('transaction_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('conversions');
	}

}
