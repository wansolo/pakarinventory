<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stock_logs', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->integer('uid');
			$table->integer('stock_id');
			$table->integer('quantity');
			$table->string('operation_type');
			$table->text('purpose')->nullable();
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
		Schema::drop('stock_logs');
	}

}
