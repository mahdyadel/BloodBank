<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('about');
			$table->string('phone');
			$table->string('facebook');
			$table->string('twiter');
			$table->string('instgram');
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}