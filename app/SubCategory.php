<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
   protected $table = 'sub_categories';

   protected $fillable = ['name', 'category_id'];

   public function category()
   {
   	return $this->belongsTo('App\Category');
   }

   public function products()
   {
   	return $this->hasMany('App\Product', 'subcatgeory_id');
   }

}
