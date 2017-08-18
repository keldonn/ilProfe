<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('picture', 255)->nullable()->default('default.png');
			$table->string('bio', 255)->nullable()->default('null');
			$table->string('location', 150)->nullable()->default('null');
			$table->string('phone', 60)->nullable()->default('null');
			$table->integer('is_profe')->default('0');
			$table->decimal('latitud', 14, 10)->default(-34.6080);
			$table->decimal('longitud', 14, 10)->default(-58.3703);
			$table->integer('is_admin')->default('0');
			$table->rememberToken('remember_token');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}
