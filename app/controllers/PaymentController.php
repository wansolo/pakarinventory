<?php

class PaymentController extends \BaseController {

	public function executeSearch()
    {
        $keywords = Input::get('keywords');
        $from = Input::get('from');
        $to = Input::get('to');
        $total = 0;
        //dd($from);
        if (!empty($keywords) AND empty($from) AND empty($to)) {
        	$payment = PaymentDetail::all();
		 	$paymentdetail = new \Illuminate\Database\Eloquent\Collection();

		        foreach($payment as $u)
		        {

		            if($u->pid == $keywords){
		           	 $paymentdetail->add($u);

		            }   
		            
		        }
		        foreach ($paymentdetail as $value) {
		        	$total = $total + $value->amount;

		        }
		        //dd($paymentdetail); 

		        return View::make('dashboard.paymentdetail')->with('paymentdetail',$paymentdetail)->with('total',$total);
        }
        elseif (!empty($keywords) AND !empty($from) AND !empty($to)) {
        		$payment = PaymentDetail::whereBetween('doa', array($from, $to))->get();
		 		$paymentdetail = new \Illuminate\Database\Eloquent\Collection();

		        foreach($payment as $u)
		        {

		            if($u->pid == $keywords){
		           	 $paymentdetail->add($u);
		           	 
		            }   
		            
		        }
		        foreach ($paymentdetail as $value) {
		        	$total = $total + $value->amount;

		        }
		        //dd($paymentdetail); 

		        return View::make('dashboard.paymentdetail')->with('paymentdetail',$paymentdetail)->with('total',$total);
        }
        else{

        }
        
    }
    
    public function payment(){
        return View::make('dashboard.viewpayment');
    }
}
