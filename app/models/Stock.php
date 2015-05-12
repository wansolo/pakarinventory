<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Stock extends Eloquent {

	protected $table = 'stocks';
	protected $primaryKey = 'stock_id';
	protected $fillable = ['item_id','current_quantity'];

    public function item()
    {
    	return $this->belongsTo('Item','item_id','item_id');
    }
    public function stockLog()
    {
        return $this->hasMany('StockLog','stock_id','stock_id');
    }

}
