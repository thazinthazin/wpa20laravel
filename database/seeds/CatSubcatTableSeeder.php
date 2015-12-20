<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\SubCategory;

class CatSubcatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	DB::table('categories')->truncate();
    	DB::table('sub_categories')->truncate();     

    	Category::insert([    		
    		['name' => 'Apple'],
    		['name' => 'Samsung'],
    		['name' => 'LG'],
    		['name' => 'Lenovo'],
    		['name' => 'Xiaomi'],
    		['name' => 'Sony'],
            ['name' => 'Dell'],            

    		]);

    	SubCategory::insert([    		
    		['category_id' => 1 ,'sub_name' => 'Phone'],
    		['category_id' => 1 ,'sub_name' => 'Laptop'],
    		['category_id' => 1 ,'sub_name' => 'TV'],
    		['category_id' => 1 ,'sub_name' => 'Tablet'],
    		['category_id' => 2 ,'sub_name' => 'Phone'],
    		['category_id' => 2 ,'sub_name' => 'Laptop'],
    		['category_id' => 2 ,'sub_name' => 'TV'],
    		['category_id' => 2 ,'sub_name' => 'Tablet'],
    		['category_id' => 3 ,'sub_name' => 'Phone'],    		
    		['category_id' => 3 ,'sub_name' => 'TV'],
    		['category_id' => 4 ,'sub_name' => 'Laptop'],
    		['category_id' => 5 ,'sub_name' => 'Phone'],    		
    		['category_id' => 5 ,'sub_name' => 'Tablet'],    		         
    		['category_id' => 6 ,'sub_name' => 'Phone'],
    		['category_id' => 6 ,'sub_name' => 'Laptop'],
    		['category_id' => 6 ,'sub_name' => 'TV'],
    		['category_id' => 6 ,'sub_name' => 'Tablet'],
            ['category_id' => 7 ,'sub_name' => 'Laptop'],            
    		]);       

    	$this->command->info('categories And sub_categories seeded!');
    }
}
