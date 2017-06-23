<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampaignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('campaigns', function(Blueprint $table)
		{
			$table->bigInteger('id_campaign', true);
			$table->string('campaign_id', 150)->unique('campaign_id');
			$table->string('campaign_name', 100);
			$table->string('campaign_url');
			$table->dateTime('created');
			$table->integer('visits');
			$table->integer('conversions');
			$table->decimal('revenue', 10);
			$table->decimal('cost', 10);
			$table->string('traffic_source_id', 100)->index('traffic_source_id');
			$table->integer('id_type_vertical_traffic');
			$table->integer('id_status')->default(0);
			$table->unique(['campaign_id','traffic_source_id','id_type_vertical_traffic','id_status'], 'campaign_id_2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('campaigns');
	}

}
