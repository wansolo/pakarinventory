<?php

class CategoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();DB::table('categories')->delete();

		Category::create(array(
			
			'category_name'    		=> 			'Broths',
			
		));
		Category::create(array(
			
			'category_name'    		=> 			'Acids',
			
		));
		
	}

}
