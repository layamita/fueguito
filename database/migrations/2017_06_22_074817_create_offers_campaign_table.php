<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersCampaignTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('offers_campaign', function(Blueprint $table)
		{
			$table->string('campaign_id', 150);
			$table->string('offer_id', 150);
			$table->unique(['campaign_id','offer_id'], 'campaign_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('offers_campaign');
	}

}
