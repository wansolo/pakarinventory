<?php

class ItemTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();DB::table('items')->delete();

		Item::create(array(
			'cat_id'     	=> 			1,
			'item_name' 		=> 	'Tampico',
			
		));
		Item::create(array(
			'cat_id'     	=> 			2,
			'item_name' 		=> 		'Sulphur',
			'consumable' 		=> 		'Yes',
			
		));
		
		
	}

}
