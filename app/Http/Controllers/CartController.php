<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sentinel;
use App\Cart;
use App\Product;


class CartController extends Controller
{

    public function getIndex()
    {
          
        // Check Users Id
        $user_id = Sentinel::getUser()->id;
        // Show Carts With Checked Users Id    
        $cart_product = Cart::with('Products')->where('user_id' , '=' , $user_id)->paginate(5);        
        // Total Amount of Carts
        $cart_total = Cart::with('Products')->where('user_id', '=' , $user_id)->sum('total');
        
       //When Products Out of Stock Auto Delete In Cart
        foreach ($cart_product as $cart_item) {            
            if ($cart_item->Products->availability == 0) {
                $cart = Cart::find($cart_item->id);               
                $cart->delete();
            }
        }

        return view('ecomm.shop.cart.index', compact('cart_product', 'cart_total'));
    }

    public function postAddToCart($productId, Request $request)
    {       
        
        // Check Users Id      
        $user_id = Sentinel::getUser()->id;
        // Check Products Id from Passing Data
        $product_id = $productId;
        // Define Valiable for Input Amount
        $i = $request->input('amount');
        // Users Cannot Add Zero And Minus Amount In Input
        if((int) $i > 0) {

            $amount = $i;
            // Find Products With Id    
            $product = Product::find($product_id);
            // Product Must Be InStock
            if($product->availability == 1){
            // Caculate Total Amount
            $total = $amount * $product->price;

            // Check Products, its Already Have Cart    
            $count = Cart::where('product_id', '=' , $product_id)->where('user_id', '=' , $user_id)->count();

            // Add Products Colors . 
            $c_count = $product->colors->lists('id')->toArray();
            // Cannot Add Other Colors , Its Must Add Products Colors                     
            $c_count = in_array($request->input('color_id') , $c_count);

            // Add Products Sizes
            $s_count = $product->sizes->lists('id')->toArray();
            // Cannot Add Other Sizes , Its Must Add Products Size 
            $s_count = in_array($request->input('size_id') , $s_count);     

            // If Products is Already Have Cart Return Redirect Back
            if($count){
                return redirect()
                ->back()
                ->with('error', 'This Item already exists in your cart.');
            }
            //Create New Cart
            $cart = new Cart;
            // Add User Id
            $cart->user_id =  $user_id;
            // Add Product Id
            $cart->product_id = $product_id;
            // Add Amount
            $cart->amount = $amount;
            // Add Total
            $cart->total = $total;
            // Add Colors , Only Must Products Color
            if($c_count == true){        
            $cart->color_id = $request->input('color_id');
            } else {
                // Not Products Color Redirect Back
                return redirect()->back();
            }
            // Add Sizes, Only Must Products Sizes
            if($s_count == true){
            $cart->size_id = $request->input('size_id');
            } else {
                // Not Products Size Redirect Back
                return redirect()->back();
            }                        
            // Cart Save
            $cart->save();
            } else {
                // If Product Out InStock Redirect Back 
                return redirect()->back();
            }
            
        } else {
            // Add Minus Or Zero Value Redirect Back    
            return redirect()->back();
        }        
        
        // Cart Create Redirect User's Cart
        return redirect()->route('cart_show');
    }

    public function postUpdateCart($id, $productId, Request $request)
    {   
     
        // Only Login Users Must Edit Carts, Cannot Edit Other Users Carts
        if(Cart::where('user_id', '=' , Sentinel::getUser()->id)->find($id)){

           
            // Add Product Id From Passing Data
            $product_id = $productId;
            // Find Products With Product Id
            $product = Product::find($product_id);
            // Product Must Be InStock
            if($product->availability == 1){
            // Find Carts
            $update_cart = Cart::find($id);
            // Define Valiable for Input Amount
            $i = $request->input('amount');
            // Users Cannot Add Zero And Minus Amount In Input
            if((int) $i > 0) {
                // Cart Update With Amount
                $update_cart->amount = $i ;                               
                $update_cart->color_id = $update_cart->color_id;
                $update_cart->size_id = $update_cart->size_id;
                $update_cart->total = $i * $product->price;
                $update_cart->save();
            }

            }

        }
        else
        {
            // Cart Add With Others User Id Redirect Back
           return redirect()->back();
        }        


        // Cart Update Show User's Cart
        return redirect()->route('cart_show');
    }


    public function postDelete($id)
    {
        
        // Only Login Users Must Delete Carts, Cannot Delete Other Users Carts
        if(Cart::where('user_id', '=' , Sentinel::getUser()->id)->find($id)){

        $cart = Cart::find($id);
        $cart->delete();

        } else {
            // Cart Delete With Others User Id Redirect Back
            return redirect()->back();
        }

        return redirect()->route('cart_show');

    }

}