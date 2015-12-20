<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Sentinel;
use Input;
use App\Cart;
use App\Order;
use App\Product;
use App\Profile;

class OrderController extends Controller
{
    
    public function getIndex()
    {    
        // Check Login User Id
        $user_id = Sentinel::getUser()->id;
        // Shwo Order Of Login Users
        $orders = Order::with('orderItems')->where('user_id', '=' , $user_id)->orderBy('created_at', 'DESC')->paginate(3);     

        return view('ecomm.shop.order.view')->with('orders', $orders);
     
    }

    public function postOrder(Request $request)
    {
        // Validate Input
        $this->validate($request, [
            'phone' => 'required',
            'company_name' => 'required',
            'street_address' => 'required',
            'home_address' => 'required',
            'postcode' => 'required',
            'town' => 'required',
            'city' => 'required',
            'country' => 'required',
          ]);        
        // Define User Id With Login User Id
          $user_id = Sentinel::getUser()->id;                
        // Define Cart Products  
          $cart_products = Cart::with('Products')->where('user_id' , '=' , $user_id)->get();       
        
        // Order Create With User Id And Input Information
            $order = Order::create([
              'user_id' => $user_id,
              'phone' => Input::get('phone'),
              'company_name' => Input::get('company_name'),
              'street_address' => Input::get('street_address'),
              'home_address' => Input::get('home_address'),
              'postcode' => Input::get('postcode'),
              'town' => Input::get('town'),
              'city' => Input::get('city'),
              'country' => Input::get('country'),             
              ]);

          // Change Cart All Products Into Each Product  
          foreach ($cart_products as $cart_product) 
          {
            
            // Define Cart Product
            $product_sum = $cart_product->products;
            // Define Max Value For Product Instock
            $max_value = $cart_product->amount <= $product_sum->instock;
            // Check Product Is Availability or Not
            if($product_sum->availability == 1)
            {
            // Check Max Value  
            if($max_value) 
            {          
            // Create Order Tables With Product => Id , Size, Color, Price, Amount, and Total
            $order->orderItems()->attach($cart_product->product_id, [
              'amount' => $cart_product->amount,
              'price' => $cart_product->products->price,
              'total' => $cart_product->total,
              'size_id' => $cart_product->size_id,
              'color_id' => $cart_product->color_id,
              ]);

              // Define Product Id
              $product_id = $cart_product->product_id;          
              // Update Product Order Count And Instock
              $product = Product::where('id', '=' , $product_id)->update([
              'order_count' => $product_sum->order_count + $cart_product->amount,
              'instock' => $product_sum->instock - $cart_product->amount,
              ]);

              } else {
                // If Have Errors Delete Order Immatiately                
                $order->delete();
                // And Return Redirect Back With Errors
                return back()->withInput()->with('error_message', 'Sorry!! Your Order Is Not Complete.Please Try Again');
              }
            }             
          }
          // When Order_Tables Create Sum Amount Of All Product Total Price
          $order_total = \DB::table('order_tables')->where('order_id', '=' , $order->id)->sum('total');
          // Save Into Order
          $order->total = $order_total;
          $order->save();

          // When Order Complete => Check Product Instock Amount And Is Must Zero Product Is Auto Disable
          foreach (Product::all() as $product) {

            if ($product->instock <= 0) {
              $product->availability = 0;
              $product->save();
            }        
          }
          //Delete Cart->item When Order is Created...
          Cart::where('user_id','=',$user_id)->delete();         

          return redirect()->route('order_show')->with('flash_message', 'Your Order Process Successfully ');
       
    }
}
