<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('age');
			$table->string('latitude');
			$table->string('longitude');
			$table->integer('client_id')->unsigned();
			$table->string('or_blood_type');
			$table->string('or_bages');
			$table->string('or_hospital_name');
			$table->string('or_adress_hospital');
			$table->string('phone');
			$table->string('detiales');
			$table->integer('city_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}