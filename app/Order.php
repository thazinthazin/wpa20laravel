<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'phone', 'total', 'company_name', 'street_address', 'home_address', 'postcode', 'town', 'city', 'country'];

    public function orderItems()
    {
    	return $this->belongsToMany('App\Product', 'order_tables')->withPivot('amount', 'price', 'total');
    }
}
