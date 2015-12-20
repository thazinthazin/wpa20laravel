<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;
use App\Profile;
use Sentinel;

class SocialController extends Controller
{
    //
    public function redirectToProvider($provider)
    {
        // User Can't Login With Social Account Redirect Social Page
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider, Request $request)
    {

        // User Login With Social Account Get Users
        $user = Socialite::driver($provider)->user();
        // First Time Or Not Check
        $db = Profile::where('idsocial', $user->getId())->first();
      // If Users Is Not First Time Authenticate With Old Data
      if($db)
      {
        // Authenticate With Sentinel
        Sentinel::authenticate(['email' => $user->getEmail(), 'password' => 'Qw4m98@$OiU46uuh12']);
        //
        return redirect()->route('customer.index');
    } else 
    {   // If First Time Create New User => Social Account
        $newuser = Sentinel::registerAndActivate([
            'email' => $user->getEmail(),            
            'password' => 'Qw4m98@$OiU46uuh12',
            'first_name' => $user->user['first_name'],
            'last_name' => $user->user['last_name'],
            ]);
        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName('Users');

        // Assign the role to the users
        $usersRole->users()->attach($newuser);
        // Create New Profile
        $newprofiles = new Profile();
        $newprofiles->user_id = $newuser->id;
        $newprofiles->idsocial = $user->getId();              
        $newprofiles->social = $provider;       
        $newprofiles->avatar = $user->getAvatar();   
        $newprofiles->save();

    } 
    // Create User Authenticate Suddenly
    Sentinel::authenticate(['email' => $user->getEmail(), 'password' => 'Qw4m98@$OiU46uuh12']);

    return redirect()->route('customer.index');  

}
}
