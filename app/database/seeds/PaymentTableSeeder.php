<?php

class PaymentTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();DB::table('payments')->delete();

		Payment::create(array(
			
			'payment_mode'    		=> 			'impress',
			
		));
		Payment::create(array(
			
			'payment_mode'    		=> 			'by_order',
			
		));
		
	}

}
