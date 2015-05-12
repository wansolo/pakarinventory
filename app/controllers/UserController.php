<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('login');	
	}

	/**
	 * Login to acceess user dashboard.
	 *
	 * @return Response
	 */

	public function login()
	{
		 $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'flag' => 1
        );
        
        if (Auth::attempt($user)) {

            return Redirect::route('home')->with('flash_notice', 'You are successfully logged in.');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')->with('message', 'Access Denied. Check credentials Or contact Admin.')->withInput();


		//return View::make('login');	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		
		$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|email',
			'username' => 'required|unique:users,username',
			'password' => 'required',
			'repeatpassword' => 'required|same:password'

		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('register')->withErrors($validator)->withInput();
		}
		else{

			$users = new User;
			$users->first_name = Input::get('firstname');
			$users->last_name = Input::get('lastname');	
			$users->username = Input::get('username');	
			$users->email = Input::get('email');
			$users->gender = Input::get('gender');
			$users->password = Hash::make(Input::get('password'));
			$users->flag = 0;
			$users->save();

			//redirect
			Session::flash('message', 'Successfully Created New Account!. Contact Admin to activate Account');
			return Redirect::to('login');
		}

		
	}

			/**
	 * Receives Id of brought by field on form to return a dropdown of people under that ID on keyup
	 *
	 * @return Response
	 */

		

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
