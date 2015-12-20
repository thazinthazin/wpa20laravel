<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Profile;

class SentinelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('role_users')->truncate();
        DB::table('profiles')->truncate();
        DB::table('activations')->truncate();
        DB::table('persistences')->truncate();       
       
        $credentials = [
        'email'    => 'user@gmail.com',
        'password' => '123456',
        'first_name' => 'mr',
        'last_name' => 'moe',
        ];

        $user = Sentinel::registerAndActivate($credentials);
        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName('Users');

        // Assign the role to the users
        $usersRole->users()->attach($user);
        //Create New Profile
        $newprofiles = new Profile();
        $newprofiles->user_id = $user->id;
        $newprofiles->avatar = 'uploads/user/avatar/02.jpg';
        $newprofiles->save();

        //USER-2
        $credentials = [
        'email'    => 'user2@gmail.com',
        'password' => '123456',
        'first_name' => 'mr',
        'last_name' => 'nat',
        ];

        $user = Sentinel::registerAndActivate($credentials);
        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName('Users');

        // Assign the role to the users
        $usersRole->users()->attach($user);
        //Create New Profile
        $newprofiles = new Profile();
        $newprofiles->user_id = $user->id;
        $newprofiles->avatar = 'uploads/user/avatar/03.jpg';
        $newprofiles->save();

        //USER-3
        $credentials = [
        'email'    => 'user3@gmail.com',
        'password' => '123456',
        'first_name' => 'mrs',
        'last_name' => 'thae',
        ];

        $user = Sentinel::registerAndActivate($credentials);
        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName('Users');

        // Assign the role to the users
        $usersRole->users()->attach($user);
        //Create New Profile
        $newprofiles = new Profile();
        $newprofiles->user_id = $user->id;
        $newprofiles->avatar = 'uploads/user/avatar/04.jpg';
        $newprofiles->save();

        //USER-4
        $credentials = [
        'email'    => 'user4@gmail.com',
        'password' => '123456',
        'first_name' => 'mrs',
        'last_name' => 'mon',
        ];

        $user = Sentinel::registerAndActivate($credentials);
        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName('Users');

        // Assign the role to the users
        $usersRole->users()->attach($user);
        //Create New Profile
        $newprofiles = new Profile();
        $newprofiles->user_id = $user->id;
        $newprofiles->avatar = 'uploads/user/avatar/05.jpg';
        $newprofiles->save();
       



        //ADMIN USERS ADD       
        $credentials = [
        'email'    => 'admin@gmail.com',
        'password' => '123456',
        'first_name' => 'moe',
        'last_name' => 'nat',
        ];

        $admin = Sentinel::registerAndActivate($credentials);

        // Find the role using the role name
        $usersRole = Sentinel::findRoleByName('Admins');

        // Assign the role to the users
        $usersRole->users()->attach($admin);
        //Create New Profile
        $newprofiles = new Profile();
        $newprofiles->user_id = $admin->id;
        $newprofiles->avatar = 'uploads/user/avatar/01.jpg';
        $newprofiles->save();

        $this->command->info('Users And Admin seeded!');

    }
}
