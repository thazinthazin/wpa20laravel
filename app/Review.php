<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use Sentinel;


class Review extends Model
{
    //
	protected $fillable = [
	'rating',
	'comment',
	];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function product()
	{
		return $this->belongsTo('App\Product');
	}
	
	public function storeReviewForProduct($productID, $comment, $rating)
	{
		$product = Product::find($productID);

  		// this will be added when we add user's login functionality
		if(Sentinel::check()){

			$this->user_id = Sentinel::getUser()->id;
		}

		$this->comment = $comment;
		$this->rating = $rating;
		$product->reviews()->save($this);

  		// recalculate ratings for the specified product
		$product->recalculateRating();
	}

}
