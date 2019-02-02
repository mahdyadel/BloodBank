<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->string('name');
			$table->increments('id');
			$table->timestamps();
			$table->string('password');
			$table->integer('phone');
			$table->string('email');
			$table->integer('blood_type_id')->unsigned();
			$table->integer('city_id')->unsigned();
			$table->date('last_date');
			$table->date('birthday');
			$table->string('api_token' ,60)->nullable();

		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}