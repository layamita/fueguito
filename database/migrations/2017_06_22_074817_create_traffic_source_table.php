<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrafficSourceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('traffic_source', function(Blueprint $table)
		{
			$table->integer('id_traffic_source', true);
			$table->string('traffic_source_name', 100)->index('traffic_source_name');
			$table->string('traffic_source_id', 100)->unique('traffic_source_id');
			$table->integer('visits');
			$table->integer('conversions');
			$table->decimal('revenue', 10);
			$table->decimal('cost', 10);
			$table->decimal('profit', 10);
			$table->decimal('payout', 10, 4);
			$table->integer('postback');
			$table->string('post_back_url', 250);
			$table->integer('id_status')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('traffic_source');
	}

}
