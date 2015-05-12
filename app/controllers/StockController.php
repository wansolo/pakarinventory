<?php

class StockController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index(){
		return View::make('dashboard.users');

	}



	public function showUsers()
	{
		
	}

	public function addstock(){
		$items = Category::lists('category_name', 'cat_id');
		$payments = Payment::lists('payment_mode', 'pid');

		return View::make('dashboard.addstock')->with('items',$items)->with('payments',$payments);

		}

public function addtostock(){
	$user_id = Auth::user()->uid;
	$rules = array(
			'current_quantity' => 'required|numeric',
			'item_name' => 'required',
			'unit' => 'required',
			

		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('addstock')->withErrors($validator)->withInput();
		}
		else{

			$current_quantity = Input::get('current_quantity');
			$item_name = Input::get('item_name');
			$unit = Input::get('unit');
			$cat_id = Input::get('cat_id');
			$consumable = Input::get('comsumable');
			$payment_id =Input::get('pid');
			$doa = Input::get('doa');
			$amount =Input::get('amount');
			
			$item = new Item;
			$item->cat_id = $cat_id;
			$item->item_name = $item_name;
			$item->consumable = $consumable;
			$item->save();

			$itemfromdb = Item::whereItem_name($item_name )->first();
			$itemid = $itemfromdb->item_id;

			$stock = new Stock;
			$stock->item_id = $itemid;
			$stock->current_quantity = $current_quantity;
			$stock->base_quantity = $current_quantity;
			$stock->unit = $unit;
			$stock->save();

			$stockfromdb = Stock::wherestock_id($itemid )->first();
			$stockid = $stockfromdb->stock_id;

			$log = new StockLog;
			$log->uid = $user_id;
			$log->stock_id = $stockid;
			$log->operation_type ='Inflow';
			$log->quantity = Input::get('current_quantity');	
			
			
			$log->save();

			$payment = new PaymentDetail;
			$payment->pid = $payment_id;
			$payment->item_id =$itemid;
			$payment->amount=$amount;
			$payment->doa=$doa;
			$payment->save();
			//redirect
			Session::flash('message', 'Successfully Added to Stock!');
			return Redirect::to('dashboard/addstock');
						
		}
	}

	public function additem(){
		$categories = Category::lists('category_name', 'cat_id');

		return View::make('dashboard.additem')->with('categories',$categories);

		}



	public function addcategory(){
		
		$category = Category::paginate(10);
		return View::make('dashboard.addcategory')->with('category',$category);

		}



	public function addtocategory(){
		$rules = array(
			'category_name' => 'required',
			
		);

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('dashboard/addcategory')->withErrors($validator)->withInput();
		}
		else{

			
			$category_name = Input::get('category_name');
			
			$category = new Category;
			$category->category_name = $category_name;
			$category->save();

			
			//redirect
			Session::flash('message', 'Successfully Added to Category!');
			return Redirect::to('dashboard/addcategory');
						
		}

		}

	public function viewstock(){
		$stock = New Stock;
		$stockdetail = $stock::paginate(10);

		
		return View::make('dashboard.viewstock')->with('stockdetail',$stockdetail);

		}

	public function viewitem(){
		$category = New Item;
		$categorydetail = $category::with('category','stock')->get();
		//$users = Item::with('category.stock')->get();
		
		//dd($categorydetail);
		
		return View::make('dashboard.viewitem')->with('categorydetail',$categorydetail);

		}
	
	public function viewlog(){
			$log = New StockLog;
			$logdetail = $log::paginate(10);
			//dd($logdetail);
			
			return View::make('dashboard.viewlog')->with('logdetail',$logdetail);

		}
	public function viewuser(){
		
			$user = New User;
			$users = $user::paginate(10);
			//dd($logdetail);
			
			return View::make('dashboard.viewuser')->with('users',$users);
		

		}

	public function activate($id){
			
			$user = New User;
			$users1 = $user::find($id);
			$users1->flag = 1;
			$users1->save();
			
			Session::flash('flash_notice', 'Successfully Activated Account!!');
			Redirect::to('dashboard/viewuser');
		
		}

	public function addoutflow(){

			$item = Item::lists('item_name', 'item_id');
			//dd($item);
		return View::make('dashboard.addoutflow')->with('item',$item);
			
			

		}


	public function addtooutflow(){

			$user_id = Auth::user()->uid;
			$rules = array(
					'current_quantity' => 'required|numeric',
					'purpose' => 'required',
					);

				$validator = Validator::make(Input::all(), $rules);

				if($validator->fails()){
					return Redirect::to('dashboard/addoutflow')->withErrors($validator)->withInput();
				}
				else{

					$current_quantity = Input::get('current_quantity');
					
					$item_id = Input::get('item_id');
					
					$stock = new Stock;
					$stockupdate = $stock::find($item_id);

					$stockid = $stockupdate->stock_id;
					
					
					$newquantity = $stockupdate->current_quantity;

					$stockupdate->current_quantity = $newquantity - $current_quantity;
					

					$stockupdate->save();

					

					$log = new StockLog;
					$log->uid = $user_id;
					$log->stock_id = $stockid;
					$log->operation_type ='Outflow';
					$log->quantity = Input::get('current_quantity');	
					$log->purpose = Input::get('purpose');	
					
					
					$log->save();

					//redirect
					Session::flash('flash_notice', 'Successfully Taken from  Stock!');
					return Redirect::to('dashboard/viewstock');
							
				}

		}
	

	public function updatestock(){
			$item = Item::lists('item_name', 'item_id');
			//dd($item);
		return View::make('dashboard.updatestock')->with('item',$item);
			
			

		}


	public function updatetostock(){

			$user_id = Auth::user()->uid;
			$rules = array(
					'current_quantity' => 'required|numeric',
					);

				$validator = Validator::make(Input::all(), $rules);

				if($validator->fails()){
					return Redirect::to('dashboard/updatestock')->withErrors($validator)->withInput();
				}
				else{

					$current_quantity = Input::get('current_quantity');
					$item_id = Input::get('item_id');
					
					$stock = new Stock;
					$stockupdate = $stock::find($item_id);

					$stockid = $stockupdate->stock_id;
					
					
					$newquantity = $stockupdate->current_quantity;

					$stockupdate->current_quantity = $newquantity + $current_quantity;
					

					$stockupdate->save();

					

					$log = new StockLog;
					$log->uid = $user_id;
					$log->stock_id = $stockid;
					$log->operation_type ='Inflow Update';
					$log->quantity = Input::get('current_quantity');	
					
					
					$log->save();

					//redirect
					Session::flash('flash_notice', 'Successfully Updated Stock!');
					return Redirect::to('dashboard/viewstock');
							
				}

		}
	
	public function editstock(){
		$stock = New Stock;
		$stockdetail = $stock::all();

		
		return View::make('dashboard.editstock')->with('stockdetail',$stockdetail);

		}


	public function editstockinfo($id){
		$stockdetail = Stock::wherestock_id($id)->first();
		
		
		return View::make('dashboard.editstockinfo')->with('stockdetail',$stockdetail);

		}

	public function updatetostockinfo(){

			$user_id = Auth::user()->uid;
			$rules = array(
					'item_name' => 'required',
					'unit' => 'required',
					'base_quantity' => 'required|numeric',
					'new_quantity' => 'required|numeric',
					);

				$validator = Validator::make(Input::all(), $rules);
				$red_id = Input::get('id');

				if($validator->fails()){
					return Redirect::to('dashboard/editstockinfo/'.$red_id)->withErrors($validator)->withInput();
				}
				else{

					$current_quantity = Input::get('current_quantity');
					$new_quantity = Input::get('new_quantity');
					$item_id = Input::get('item_id');
					$item_name = Input::get('item_name');


					$red_id = Input::get('id');
					
					$stock = new Stock;
					$stockupdate = $stock::find($red_id);
					$stockupdate->base_quantity = $new_quantity;
					$stockupdate->save();

					$item = new Item;
					$itemupdate = $item::find($item_id);
					$itemupdate->item_name = $item_name;
					$itemupdate->save();

					$log = new StockLog;
					$log->uid = $user_id;
					$log->stock_id = $red_id;
					$log->operation_type ='Stock Update';
					$log->quantity = Input::get('new_quantity');	
					
					
					$log->save();

					//redirect
					Session::flash('flash_notice', 'Successfully Updated Stock Item!');
					return Redirect::to('dashboard/viewstock');
							
				}

		}

	

}