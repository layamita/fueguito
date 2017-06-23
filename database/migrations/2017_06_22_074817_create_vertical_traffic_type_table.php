<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVerticalTrafficTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('gollum')->create('vertical_traffic_type', function(Blueprint $table)
		{
			$table->integer('id_type_vertical_traffic', true);
			$table->string('vertical_traffic', 10);
			$table->string('id_vertical', 50)->index('id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('gollum')->drop('vertical_traffic_type');
	}

}
