<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCountryCodeCarrierTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('country_code_carrier', function(Blueprint $table)
		{
			$table->integer('id_country_code_carrier', true);
			$table->string('country_code', 100)->nullable()->default('0');
			$table->string('mobile_carrier', 250);
			$table->unique(['country_code','mobile_carrier'], 'country_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('country_code_carrier');
	}

}
