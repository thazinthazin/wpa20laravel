<?php

use Illuminate\Database\Seeder;

class AllUserAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reviews')->truncate();
        DB::table('carts')->truncate();
        DB::table('orders')->truncate();
        DB::table('order_tables')->truncate();
        DB::table('messages')->truncate();
        DB::table('wish_lists')->truncate();


        DB::table('reviews')->insert([    		
    	
    	['user_id' => 1, 'product_id' => 1 , 'rating' => 5 , 'comment' => 'Good Product' , 'approved' => 1],
    
   		]);

        DB::table('carts')->insert([    		
    	
    	['user_id' => 1, 'product_id' => 1 , 'color_id' => 2 , 'size_id' => 2 , 'amount' => 1 , 'total' => 899.99],
    
   		]);

   		DB::table('orders')->insert([    		
    	
    	['user_id' => 1, 'phone' => 250001662 , 'company_name' => 'Hola' , 'street_address' => 'MyoThit(1)Street' , 'home_address' => 'No(51),5th Floor', 'postcode' => '11211', 'town' => 'Tamwe', 'city' => 'Yangon', 'country' => 'Myanmar', 'total' => 899.99],
    
   		]);


   		DB::table('order_tables')->insert([    		
    	
    	['order_id' => 1, 'product_id' => 1 , 'amount' => 1 ,'price' => 899.99, 'total' => 899.99,  'color_id' => 2 , 'size_id' => 2],
    
   		]);


        DB::table('orders')->insert([           
        
        ['user_id' => 2, 'phone' => 250001662 , 'company_name' => 'Hola' , 'street_address' => 'MyoThit(1)Street' , 'home_address' => 'No(51),5th Floor', 'postcode' => '11211', 'town' => 'Tamwe', 'city' => 'Yangon', 'country' => 'Myanmar', 'total' => 899.99],
    
        ]);


        DB::table('order_tables')->insert([         
        
        ['order_id' => 2, 'product_id' => 1 , 'amount' => 1 ,'price' => 899.99, 'total' => 899.99,  'color_id' => 2 , 'size_id' => 2],
    
        ]);


        DB::table('orders')->insert([           
        
        ['user_id' => 3, 'phone' => 250001662 , 'company_name' => 'Hola' , 'street_address' => 'MyoThit(1)Street' , 'home_address' => 'No(51),5th Floor', 'postcode' => '11211', 'town' => 'Tamwe', 'city' => 'Yangon', 'country' => 'Myanmar', 'total' => 899.99],
    
        ]);


        DB::table('order_tables')->insert([         
        
        ['order_id' => 3, 'product_id' => 1 , 'amount' => 1 ,'price' => 899.99, 'total' => 899.99,  'color_id' => 2 , 'size_id' => 2],
    
        ]);



    }
}
