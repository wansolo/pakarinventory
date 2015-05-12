<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Payment extends Eloquent {

	protected $table = 'payments';
	protected $primaryKey = 'pid';
	protected $fillable = ['payment_mode'];
	
	public function paymentdetail()
    {
        return $this->hasMany('PaymentDetail','pid','pid');
    }

    

}
