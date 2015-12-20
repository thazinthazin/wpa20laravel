<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\WishList;
use Sentinel;

class WishlistController extends Controller
{
    //
    public function getIndex()
    {	

        // Check User Id
    	$user_id = Sentinel::getUser()->id;
        // Show Wishlist With Checked User Id   
    	$wishlist_product = WishList::with('products')->where('user_id' , '=' , $user_id)->paginate(5);
       
    	return view('ecomm.shop.wishlist.index', compact('wishlist_product'));
    }

    public function postAddToWishList($productId, Request $request)
    {

        // Check User Id
    	$user_id = Sentinel::getUser()->id;
        // Get Product Id
    	$product_id = $productId;
        // Find Product With Product Id
    	$product = Product::find($product_id);
        // Product Must Be InStock
        if($product->availability == 1){

        // Check Products, its Already Have Wishlist      
    	$count = WishList::where('product_id', '=' , $product_id)->where('user_id', '=' , $user_id)->count();
        
        // If Products is Already Have Wishlist Return Redirect Back
        if($count){
            return redirect()->back()->with('error', 'This Item already exists in your WishList.');
        }
        // New Wishlist Create
        WishList::create([
        	'user_id' => $user_id,
        	'product_id' => $product_id,
        	]);

        }

        return redirect()->back()->withMessage('This Items Add To Your WishList');
    }

    public function getDelete($id)
    {
    	
        // Only Login Users Must Delete Wishlist, Cannot Delete Other Users Wishlist
        if(Wishlist::where('user_id', '=' , Sentinel::getUser()->id)->find($id)){
        // Find Wishlist Id
        $wishlist = WishList::find($id);
        // Delete Wishlist
        $wishlist->delete();

        } else {
            // Wishlist Delete With Others User Id Redirect Back
            return redirect()->back();
        }

        return redirect()->route('wishlist_show');

        }
    
    }
