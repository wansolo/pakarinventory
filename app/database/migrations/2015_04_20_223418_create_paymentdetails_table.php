<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paymentdetails', function(Blueprint $table)
		{
			$table->increments('pdid');
			$table->integer('pid');
			$table->integer('item_id');
			$table->double('amount', 15, 8);
			$table->date('doa')->nullable();
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
		Schema::drop('paymentdetails');
	}

}
