<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use Sentinel;
use App\User;
use Input;
use Redirect;
use Validator;
use App\UserExtend;
use App\Cart;
use App\WishList;
use Socialite;
use DB;
use App\Profile;
use File;
use App\Order;

class CustomerController extends Controller
{

    public function __construct()
    {

      if(Sentinel::check()){        
      // Define Login User Id
      $user_id = Sentinel::getUser()->id;
      // Define Cart With Login User Id
      $cart_product = Cart::with('Products')->where('user_id' , '=' , $user_id)->orderBy('created_at', 'DESC')->get();
      //When Products Out of Stock Auto Delete In Cart
        foreach ($cart_product as $cart_item) {            
            if ($cart_item->Products->availability == 0) {
                $cart = Cart::find($cart_item->id);               
                $cart->delete();
            }
        } 
      }

    }

    public function index()
    {  
      //See Latest Products
      $products = Product::where('availability', '=' , 1)->take(9)->orderBy( 'created_at', 'DESC' )->get();
      // Define Login User Id
      $user_id = Sentinel::getUser()->id;
      // Define Cart With Login User Id
      $cart_product = Cart::with('Products')->where('user_id' , '=' , $user_id)->orderBy('created_at', 'DESC')->get();    
      // Define Wishlist With Login User Id
      $wishlist_product = WishList::with('products')->where('user_id' , '=' , $user_id)->orderBy('created_at', 'DESC')->get();
      // Define Availabe Products WishList    
      $count_wishlist_product = DB::table('products')->where('availability', '=' , 1)
                                                     ->join('wish_lists', function ($join) {
                                                        $join->on('products.id', '=', 'wish_lists.product_id')
                                                              ->where('wish_lists.user_id', '=', Sentinel::getUser()->id);
                                                      })->get();
      // Define Order With Login User Id
      $orders = Order::with('orderItems')->where('user_id', '=' , $user_id)->orderBy('created_at', 'DESC')->get();        

      return view('ecomm.customer.index', compact('products', 'cart_product', 'wishlist_product', 'orders' , 'count_wishlist_product'));
    }

    public function getLogin()
    {
      // User Is Login Can't Login Again
      if(Sentinel::check()){
        return redirect()->route('customer.index')->with('error', 'You Already Login');
      }

      return view('ecomm.customer.login');
    }

    public function postLogin(Request $request)
    {
        // Validate Input
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
        ]);
        // Define Input
        $input = $request->only('email', 'password');       
        // Authenticate with Admin Roles
        if (Sentinel::authenticate($input)) {
        $user = Sentinel::getUser();
        $role = Sentinel::findRoleByName('Users');         

        if ($user->inRole($role)) {
          return redirect()->route('customer.index');
        }  else {
        // When Not Users Auto Logout And Redirect Back
         Sentinel::logout();
         return redirect()->back()->with('error_message', 'email address or password wrong'); 
         }

        }
      
      return redirect()->route('customer_login')->with('error_message', 'email address or password wrong');   

    }  

    public function getLogout()
    {
      Sentinel::logout();
      return redirect()->route('shop_home');
    }

    public function getCreate()
    {
      //User Is Login Can't Create New
      if(Sentinel::check()){
        return redirect()->route('customer.index')->with('error', 'You Already Login and Need To Logout');
      }
      return view('ecomm.customer.register');
    }

    public function store(Request $request)
    {
        // Validate Input
        $this->validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required',
          'password' => 'required|confirmed',            
          ]);

        // Define Input
        $input = $request->only('email', 'password', 'first_name', 'last_name');
        // Register And Activate Input User
        $user = Sentinel::registerAndActivate($input);

        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName('Users');

        // Assign the role to the users
        $usersRole->users()->attach($user);

        // Create New Profile
        $newprofiles = new Profile();
        $newprofiles->user_id = $user->id;
        $newprofiles->avatar = 'uploads/user/avatar/no-user.png'; // Change Config
        $newprofiles->save();

      return redirect()->route('customer_login')->with('flash_message', 'Account Successfully Created. Please Log In');

    }   

    public function update($id, Request $request)
    {
     
     // Only Login Users Must Edit Users , Cannot Edit Other Users Users
     $user = User::where('id', '=', Sentinel::getUser()->id)->find($id);

     if($user){

       //If User Login With Social Can't Modified email ...
       $social_user = Profile::where('user_id', '=' , $user->id)->get(['idsocial'])->toArray();
       $social_user_id = $social_user[0];
       $check_null = (array_key_exists('idsocial', $social_user_id) && is_null($social_user_id['idsocial']));
       // Update First Name
       $user->first_name = $request->input('first_name');
       // Update Last Name
       $user->last_name = $request->input('last_name');

       if($check_null){
         // Not Social Users Update Email
         $user->email = $request->input('email');
       }else {
         // Social User Can't Modified Email
         $user->email = $user->email;
       }
       // Update Users
       $user->save();

     } else {
       // 
       return redirect()->back()->with('error', 'Something is wrong'); 
     }
       // Update Complete Show Update
       return redirect()->back();

    }

    public function profileUpdate($id, Request $request)
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


      // Only Login Users Must Edit Profile , Cannot Edit Other Users Profile
     $profile = Profile::where('user_id', '=' , Sentinel::getUser()->id)->find($id);


      //If User Login With Social Can't Modified Avatar ...
     $social_user = Profile::where('user_id', '=' , Sentinel::getUser()->id)->get(['idsocial'])->toArray();
     $social_user_id = $social_user[0];
     $check_null = (array_key_exists('idsocial', $social_user_id) && is_null($social_user_id['idsocial']));      
     // Login Users True
     if($profile){
        // Update All Users Profile
       $profile->phone = $request->input('phone');
       $profile->company_name = $request->input('company_name');
       $profile->street_address = $request->input('street_address');
       $profile->home_address = $request->input('home_address');
       $profile->postcode = $request->input('postcode');
       $profile->town = $request->input('town');
       $profile->city = $request->input('city');
       $profile->country = $request->input('country');         
       // Login Users Is Not Social
       if($check_null){
       // No Change Avatar Get Old Avatar
       if(!$request->hasFile('avatar')){

       $profile->avatar = $profile->avatar;    

       } else {
        // Update Avatar
        $file = $request->file('avatar');
        $destination_path = 'uploads/user/avatar/';
        $filename = $file->getClientOriginalName();        
        $file->move($destination_path, $filename);
        $profile->avatar = $destination_path . $filename;

       }

      }
      // Profile Updated
      $profile->save();


    } else {
      // Profile Change With Others User Id Redirect Back
      return redirect()->back();
    }
      // Complete Redirect
      return redirect()->back();

    }


    // public function destroy($id)
    // {
    //   // Not Need
    // }
}
