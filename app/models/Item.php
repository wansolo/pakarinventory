<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Item extends Eloquent {

	protected $table = 'items';
	protected $primaryKey = 'item_id';
	protected $fillable = ['cat_id','item_name','consumable'];
	
	public function stock()
    {
        return $this->hasOne('Stock','item_id','item_id');
    }

    public function category()
    {
    	return $this->belongsTo('Category','cat_id','cat_id');
    }
    public function paymentdetail()
    {
        return $this->hasMany('PaymentDetail','item_id','item_id');
    }

}
