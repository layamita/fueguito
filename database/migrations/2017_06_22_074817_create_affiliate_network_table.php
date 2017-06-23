<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAffiliateNetworkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('affiliate_network', function(Blueprint $table)
		{
			$table->integer('affiliate_id', true);
			$table->string('affiliate_network_id', 100)->unique('affiliate_network_id');
			$table->string('affiliate_network_name', 100);
			$table->integer('visits');
			$table->integer('conversions');
			$table->decimal('revenue', 10);
			$table->decimal('cost', 10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('affiliate_network');
	}

}
