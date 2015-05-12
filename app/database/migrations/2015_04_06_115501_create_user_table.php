<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('uid');
			$table->string('first_name',25);
			$table->string('last_name', 25);
			$table->string('username', 25);
			$table->string('gender')->nullable();
			$table->string('password', 64);
			$table->string('email')->nullable();
			$table->integer('flag');
			$table->string('type')->nullable();
			// required for Laravel 4.1.26
            $table->string('remember_token', 100)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
