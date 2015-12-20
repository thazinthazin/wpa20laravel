<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    protected $guarded = [];

    protected $fillable = [
    'category_id', 'title', 'description', 'price', 'availibility', 'image',
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function colors()
    {
        return $this->belongsToMany('App\Color', 'color_roles')->withPivot('product_id', 'color_id');
    }

    public function wish_lists()
    {
        return $this->belongsToMany('App\WishList');
    }   

    public function sizes()
    {
        return $this->belongsToMany('App\Size', 'size_roles')->withPivot('product_id', 'size_id');
    }
	
    public function recalculateRating()

    {
        $reviews = $this->reviews();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating, 1);
        $this->rating_count = $reviews->count();
        $this->save();
    }



}
