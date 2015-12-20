<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    //
    protected $fillable = ['user_id', 'product_id'];

    public function products()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }


    
}
