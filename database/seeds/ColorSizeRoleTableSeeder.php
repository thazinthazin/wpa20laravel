<?php

use Illuminate\Database\Seeder;

class ColorSizeRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

     DB::table('color_roles')->truncate();    	    	
     DB::table('size_roles')->truncate(); 

    DB::table('color_roles')->insert([    		
    ['product_id' => 1 , 'color_id' => 2 ],
    ['product_id' => 1 , 'color_id' => 3 ],
    ['product_id' => 1 , 'color_id' => 4 ],
    ['product_id' => 2 , 'color_id' => 2 ],
    ['product_id' => 2 , 'color_id' => 4 ],
    ['product_id' => 2 , 'color_id' => 5 ],
    ['product_id' => 2 , 'color_id' => 6 ],
    ['product_id' => 3 , 'color_id' => 1 ],
    ['product_id' => 4 , 'color_id' => 1 ],
    ['product_id' => 5 , 'color_id' => 1 ],
    ['product_id' => 6 , 'color_id' => 1 ],    
    ['product_id' => 7 , 'color_id' => 1 ],
    ['product_id' => 8 , 'color_id' => 1 ],
    ['product_id' => 9 , 'color_id' => 1 ],

    ['product_id' => 10 , 'color_id' => 4 ],
    ['product_id' => 10 , 'color_id' => 5 ],
    ['product_id' => 10 , 'color_id' => 6 ],
    ['product_id' => 11 , 'color_id' => 2 ],
    ['product_id' => 11 , 'color_id' => 5 ],
    ['product_id' => 12 , 'color_id' => 4 ],

    ['product_id' => 13 , 'color_id' => 1 ],
    ['product_id' => 14 , 'color_id' => 1 ],
    ['product_id' => 15 , 'color_id' => 1 ],
    ['product_id' => 16 , 'color_id' => 1 ],
    ['product_id' => 17 , 'color_id' => 1 ],
    ['product_id' => 18 , 'color_id' => 1 ],
    ['product_id' => 19 , 'color_id' => 1 ],
    ['product_id' => 20 , 'color_id' => 1 ],
    ['product_id' => 21 , 'color_id' => 1 ],
    ['product_id' => 22 , 'color_id' => 1 ],
    ['product_id' => 23 , 'color_id' => 1 ],    
    ['product_id' => 24 , 'color_id' => 1 ],
    ['product_id' => 25 , 'color_id' => 1 ],
    ['product_id' => 26 , 'color_id' => 1 ],

    ['product_id' => 27 , 'color_id' => 1 ],
    ['product_id' => 28 , 'color_id' => 1 ],
    ['product_id' => 29 , 'color_id' => 1 ],
    ['product_id' => 30 , 'color_id' => 1 ],
    ['product_id' => 31 , 'color_id' => 1 ],
    ['product_id' => 32 , 'color_id' => 1 ], 

    ['product_id' => 33 , 'color_id' => 1 ],
    ['product_id' => 34 , 'color_id' => 1 ],
    ['product_id' => 35 , 'color_id' => 1 ],
    ['product_id' => 36 , 'color_id' => 1 ],
    ['product_id' => 37 , 'color_id' => 1 ],
    ['product_id' => 38 , 'color_id' => 1 ],
    ['product_id' => 39 , 'color_id' => 1 ],
    ['product_id' => 40 , 'color_id' => 1 ],
    ['product_id' => 41 , 'color_id' => 1 ],
    ['product_id' => 42 , 'color_id' => 1 ],
    ['product_id' => 43 , 'color_id' => 1 ],    
    ['product_id' => 44 , 'color_id' => 1 ],
    ['product_id' => 45 , 'color_id' => 1 ],
    ['product_id' => 46 , 'color_id' => 1 ],

    ['product_id' => 47 , 'color_id' => 1 ],
    ['product_id' => 48 , 'color_id' => 1 ],
    ['product_id' => 49 , 'color_id' => 1 ],
    ['product_id' => 50 , 'color_id' => 1 ],
    ['product_id' => 51 , 'color_id' => 1 ],
    ['product_id' => 52 , 'color_id' => 1 ],  
    
   	]);

   	 DB::table('size_roles')->insert([    		
    ['product_id' => 1 , 'size_id' => 2 ],
    ['product_id' => 1 , 'size_id' => 3 ],
    ['product_id' => 2 , 'size_id' => 2 ],
    ['product_id' => 2 , 'size_id' => 3 ],
    ['product_id' => 2 , 'size_id' => 4 ],
    ['product_id' => 3 , 'size_id' => 1 ],
    ['product_id' => 4 , 'size_id' => 1 ],
    ['product_id' => 5 , 'size_id' => 1 ],
    ['product_id' => 6 , 'size_id' => 1 ],
    ['product_id' => 7 , 'size_id' => 1 ],
    ['product_id' => 8 , 'size_id' => 2 ],
    ['product_id' => 8 , 'size_id' => 3 ],    
    ['product_id' => 9 , 'size_id' => 1 ],

    ['product_id' => 10 , 'size_id' => 2 ],
    ['product_id' => 10 , 'size_id' => 3 ],
    ['product_id' => 11 , 'size_id' => 2 ],
    ['product_id' => 11 , 'size_id' => 4 ],
    ['product_id' => 12 , 'size_id' => 2 ],

    ['product_id' => 13 , 'size_id' => 1 ],
    ['product_id' => 14 , 'size_id' => 1 ],
    ['product_id' => 15 , 'size_id' => 1 ],
    ['product_id' => 16 , 'size_id' => 1 ],
    ['product_id' => 17 , 'size_id' => 1 ],
    ['product_id' => 18 , 'size_id' => 1 ],
    ['product_id' => 19 , 'size_id' => 1 ],
    ['product_id' => 20 , 'size_id' => 1 ],
    ['product_id' => 21 , 'size_id' => 1 ],
    ['product_id' => 22 , 'size_id' => 1 ],
    ['product_id' => 23 , 'size_id' => 1 ],
    ['product_id' => 24 , 'size_id' => 1 ],    
    ['product_id' => 25 , 'size_id' => 1 ],

    ['product_id' => 26 , 'size_id' => 1 ],
    ['product_id' => 27 , 'size_id' => 1 ],
    ['product_id' => 28 , 'size_id' => 1 ],
    ['product_id' => 29 , 'size_id' => 1 ],
    ['product_id' => 30 , 'size_id' => 1 ], 


    ['product_id' => 31 , 'size_id' => 1 ],
    ['product_id' => 32 , 'size_id' => 1 ],
    ['product_id' => 33 , 'size_id' => 1 ],
    ['product_id' => 34 , 'size_id' => 1 ],
    ['product_id' => 35 , 'size_id' => 1 ],
    ['product_id' => 36 , 'size_id' => 1 ],
    ['product_id' => 37 , 'size_id' => 1 ],
    ['product_id' => 38 , 'size_id' => 1 ],
    ['product_id' => 39 , 'size_id' => 1 ],
    ['product_id' => 40 , 'size_id' => 1 ],
    ['product_id' => 41 , 'size_id' => 1 ],
    ['product_id' => 42 , 'size_id' => 1 ],    
    ['product_id' => 43 , 'size_id' => 1 ],

    ['product_id' => 44 , 'size_id' => 1 ],
    ['product_id' => 45 , 'size_id' => 1 ],
    ['product_id' => 46 , 'size_id' => 1 ],
    ['product_id' => 47 , 'size_id' => 1 ],
    ['product_id' => 48 , 'size_id' => 1 ],    

    ['product_id' => 49 , 'size_id' => 1 ],
    ['product_id' => 50 , 'size_id' => 1 ],
    ['product_id' => 51 , 'size_id' => 1 ],
    ['product_id' => 52 , 'size_id' => 1 ],
     
    
   	]);       

    	$this->command->info('Products seeded!');

    }
}
