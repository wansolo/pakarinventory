<?php

class StockTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();DB::table('stocks')->delete();

		Stock::create(array(
			'item_id'     	=> 			1,
			'current_quantity' 		=> 			20,
			'base_quantity' 		=> 			20,
			'unit'    		=> 			'bottle',
			
		));
		Stock::create(array(
			'item_id'     	=> 			2,
			'current_quantity' 		=> 			20,
			'base_quantity' 		=> 			20,
			'unit'    		=> 			'gramms',
			
		));
		
	}

}
