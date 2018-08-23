<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Message;
use Sentinel;
use App\User;
use Input;
use Redirect;
use Validator;
use App\Order;
use DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get All Data to Dashboard   
        $products = Product::all();
        $categories = Category::all();
        $users = User::all();

        return view('ecomm.admin.index', compact('categories', 'products', 'users'));
    }


    public function getUser()
    {
        //Get Users With All Roles
        $users = DB::table('role_users')->join('roles', 'role_users.role_id', '=', 'roles.id')
                                        ->join('users', 'role_users.user_id', '=', 'users.id')
                                        ->orderBy('name', 'ASC')                                  
                                        ->get();     

        return view('ecomm.admin.member.index', compact('users'));
    }

    public function getOrder()
    {     
        // Get Orders_tables  
        $order_tables = DB::table('order_tables')->get();      
   

        return view('ecomm.admin.orders.index', compact('order_tables'));
    }

    public function getMessage()
    {     
        // Get Message Tables
        $messages = Message::get();    
   
        return view('ecomm.admin.messages.index', compact('messages'));
    }

    public function postUpdateMessage($id, Request $request)
    {
        // Update Approved With Message Id       
        $messages = Message::find($id);       
        $messages->approved = $request->input('approved');
        $messages->save();

        return redirect()->back();
    }


    public function getLogin()
    {
        // When You Loggin Redirect Back
        if(Sentinel::check()){
            return redirect()->route('admin_home')->with('error', 'You Already Login');
        }
          
       return view('ecomm.admin.member.login');
    }

    public function postLogin(Request $request)
    {
        //Validate Input
       $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required',
           ]);
        
        //Define Input
        $input = $request->only('email', 'password');

        // Authenticate with Admin Roles
         if (Sentinel::authenticate($input)) {

                $user = Sentinel::getUser();
                $admin = Sentinel::findRoleByName('Admins');               
                if ($user->inRole($admin)) {                    
                    return redirect()->route('admin_home');
                } else {
                    // When Not Admins Auto Logout And Redirect Back
                    Sentinel::logout();
                    return redirect()->back()->with('error_message', 'email address or password wrong');
                }
                
            }

            //When Login Errors Show Errors and Redirect Login Page
            return redirect()->route('admin_login')->withInput()->withErrorMessage('Sorry Something Wrong');

    }


    public function getLogout()
    {
        //Logout 
        Sentinel::logout();

        return redirect()->route('shop_home');
    }

    public function getDelete($id)
    {

            // Delete Users With All Users Active
        $user = User::find($id);               
            // Delete Users Reviews
        DB::table('reviews')->where('user_id', '=' , $user->id)->delete();          
            // Delete Users Carts       
        DB::table('carts')->where('user_id', '=' , $user->id)->delete();
            // Delete Users Messages
        DB::table('messages')->where('user_id', '=' , $user->id)->delete();
            // Delete Users Wish_Lists
        DB::table('wish_lists')->where('user_id', '=' , $user->id)->delete();
            // Delete Users Profiles
        DB::table('profiles')->where('user_id', '=' , $user->id)->delete();
            // Delete Users Persistences
        DB::table('persistences')->where('user_id', '=' , $user->id)->delete();
            // Delete Users Activations
        DB::table('activations')->where('user_id', '=' , $user->id)->delete();
            // Delete Users Roles
        DB::table('role_users')->where('user_id', '=' , $user->id)->delete();

        $user->delete();

        return redirect()->back();
    }

}