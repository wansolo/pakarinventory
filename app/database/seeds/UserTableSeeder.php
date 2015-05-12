<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();DB::table('users')->delete();

		User::create(array(
			'first_name'     	=> 			'Michael',
			'last_name' 		=> 			'Okorie',
			'username'    		=> 			'onyekam',
			'gender'    		=> 			'male',
			'email'    			=> 			'michaelo_@hotmail.com',
			'flag'    			=> 			'1',
			'password' 			=> 			Hash::make('ish213'),
			
		));
		User::create(array(
			'first_name'     	=> 			'Solomon',
			'last_name' 		=> 			'Sunu',
			'username'    		=> 			'wansolo',
			'gender'    		=> 			'male',
			'email'    			=> 			'solomon_sunu@gmail.com',
			'flag'    			=> 			'1',
			'type'    			=> 			'admin',
			'password' 			=> 			Hash::make('leverage'),
			
		));
	}

}
