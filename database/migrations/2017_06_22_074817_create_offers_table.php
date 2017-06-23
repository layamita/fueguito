<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('offers', function(Blueprint $table)
		{
			$table->integer('id_offer', true);
			$table->string('offer_id', 100)->unique('offer_id');
			$table->string('offer_name', 150);
			$table->string('offer_url')->nullable();
			$table->string('offer_country', 100);
			$table->decimal('payout', 10);
			$table->integer('visits');
			$table->integer('conversions');
			$table->decimal('revenue', 10);
			$table->decimal('cost', 10);
			$table->string('affiliate_network_id', 100)->nullable();
			$table->decimal('epv', 10, 4);
			$table->decimal('ecpm', 10, 4);
			$table->integer('id_device');
			$table->integer('id_operating_system');
			$table->integer('id_connection');
			$table->dateTime('update_datetime');
			$table->integer('id_type_vertical_traffic')->nullable()->index('id_type_vertical_traffic');
			$table->string('id_model_cost', 50)->nullable()->index('id_model_cost');
			$table->string('id_country', 50)->nullable()->index('id_country');
			$table->string('country_code', 5);
			$table->string('id_country_code_carrier', 50)->nullable()->index('id_country_code_carrier');
			$table->string('id_type_connection', 50)->nullable()->index('id_type_connection');
			$table->string('id_os', 50)->nullable()->index('id_os');
			$table->string('id_os_version', 50)->nullable()->index('id_os_version');
			$table->integer('new')->default(1);
			$table->integer('id_status')->nullable()->default(0)->index('id_status');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('offers');
	}

}
