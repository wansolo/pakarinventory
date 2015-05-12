<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Category extends Eloquent {

	protected $table = 'categories';
	protected $primaryKey = 'cat_id';
	protected $fillable = ['category_name'];
	
	public function item()
    {
        return $this->hasMany('Item','item_id','item_id');
    }

    

}
