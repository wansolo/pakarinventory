<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class StockLog extends Eloquent {

	protected $table = 'stock_logs';
	protected $primaryKey = 'log_id';
	protected $fillable = ['uid','stock_id','operation_type','quantity','purpose'];
	
	public function stock()
    {
        return $this->belongsTo('Stock', 'stock_id','stock_id');
    }

    public function user()
    {
    	return $this->belongsTo('User','uid','uid');
    }

}
