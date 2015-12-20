<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(SentinelRoleSeeder::class);
        $this->call(SentinelUserSeeder::class);        
        $this->call(ColorSizeTableSeeder::class);
        $this->call(CatSubcatTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ColorSizeRoleTableSeeder::class); 
        $this->call(AllUserAddSeeder::class);


        $this->command->info('All tables seeded!');

        Model::reguard();
    }
}
