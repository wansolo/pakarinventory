<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class PaymentDetail extends Eloquent {

	protected $table = 'paymentdetails';
	protected $primaryKey = 'pdid';
	protected $fillable = ['pid','item_id','amount','doa'];
	
	public function payment()
    {
        return $this->belongsTo('Payment','pid','pid');
    }

    public function item()
    {
        return $this->belongsTo('Item','item_id','item_id');
    }

    

}
