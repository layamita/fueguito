<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersVisitsConsolidatedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('offers_visits_consolidated', function(Blueprint $table)
		{
			$table->integer('id_offer_new', true);
			$table->string('offer_id', 100)->unique('offer_id');
			$table->integer('total_visits');
			$table->integer('converted');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('offers_visits_consolidated');
	}

}
