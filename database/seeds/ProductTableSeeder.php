<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
    DB::table('products')->truncate();    	    	

    Product::insert([
    // Apple    		
    ['category_id' => 1 , 'subcatgeory_id' => 1 , 'rating_cache' => 5, 'title' => 'Iphone-6', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-p-001.jpg' , 'price' => 899.99],
    ['category_id' => 1 , 'subcatgeory_id' => 1 , 'rating_cache' => 3, 'title' => 'Iphone-6s', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-p-002.jpg' , 'price' => 1099.99],
    ['category_id' => 1 , 'subcatgeory_id' => 1 , 'rating_cache' => 3, 'title' => 'Iphone-4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-p-004.jpg' , 'price' => 299.99],
    ['category_id' => 1 , 'subcatgeory_id' => 1 , 'rating_cache' => 3, 'title' => 'Iphone-5s', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-p-005.jpg' , 'price' => 399.99],
    ['category_id' => 1 , 'subcatgeory_id' => 2 , 'rating_cache' => 5, 'title' => 'Mac Book Air', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-l-001.jpg' , 'price' => 1299.99],
    ['category_id' => 1 , 'subcatgeory_id' => 2 , 'rating_cache' => 3, 'title' => 'Mac Book Pro', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-l-002.jpg' , 'price' => 1399.99],
    ['category_id' => 1 , 'subcatgeory_id' => 3 , 'rating_cache' => 3, 'title' => 'Apple TV', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-tv-002.jpg', 'price' => 1499.99],
    ['category_id' => 1 , 'subcatgeory_id' => 4 , 'rating_cache' => 3, 'title' => 'Ipad Air-2', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-t-001.jpg' , 'price' => 599.99],
    ['category_id' => 1 , 'subcatgeory_id' => 4 , 'rating_cache' => 5, 'title' => 'Ipad Air-Mini', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/a-t-002.jpg' , 'price' => 499.99],
    // Samsung
    ['category_id' => 2 , 'subcatgeory_id' => 5 , 'rating_cache' => 3, 'title' => 'Note-Edge', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-p-001.jpg' , 'price' => 900.99],
    ['category_id' => 2 , 'subcatgeory_id' => 5 , 'rating_cache' => 3, 'title' => 'Note-4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-p-002.jpg' , 'price' => 500.99],
    ['category_id' => 2 , 'subcatgeory_id' => 5 , 'rating_cache' => 5, 'title' => 'Note-5', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-p-004.jpg' , 'price' => 800.99],  
    ['category_id' => 2 , 'subcatgeory_id' => 5 , 'rating_cache' => 3, 'title' => 'Galaxy-S6', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-p-005.jpg' , 'price' => 699.99],
    ['category_id' => 2 , 'subcatgeory_id' => 5 , 'rating_cache' => 5, 'title' => 'Galaxy-S6-Edge', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-p-006.jpg' , 'price' => 879.99],
    ['category_id' => 2 , 'subcatgeory_id' => 5 , 'rating_cache' => 3, 'title' => 'Galaxy-S5', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-p-007.jpg' , 'price' => 599.99],  
    ['category_id' => 2 , 'subcatgeory_id' => 5 , 'rating_cache' => 3, 'title' => 'Galaxy-S4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-p-008.jpg' , 'price' => 489.99],  


    ['category_id' => 2 , 'subcatgeory_id' => 6 , 'rating_cache' => 3, 'title' => 'Samsung-Ativ', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-l-002.jpg' , 'price' => 699.99],
    ['category_id' => 2 , 'subcatgeory_id' => 6 , 'rating_cache' => 3, 'title' => 'Samsung-Laptop', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-l-001.jpg' , 'price' => 499.99],

    ['category_id' => 2 , 'subcatgeory_id' => 7 , 'rating_cache' => 4, 'title' => 'Samsung-TV-Curved', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-tv-001.jpg' , 'price' => 3299.99],
    ['category_id' => 2 , 'subcatgeory_id' => 7 , 'rating_cache' => 5,  'title' => 'Samsung-TV-60-FullHD', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-tv-002.jpg' , 'price' => 4900.00],
    ['category_id' => 2 , 'subcatgeory_id' => 7 , 'rating_cache' => 3,  'title' => 'Samsung-LED-TV', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-tv-003.jpg' , 'price' => 859.00],  
    ['category_id' => 2 , 'subcatgeory_id' => 7 , 'rating_cache' => 3,  'title' => 'Samsung-SMART-TV', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-tv-004.jpg' , 'price' => 499.99],
        
    ['category_id' => 2 , 'subcatgeory_id' => 8 , 'rating_cache' => 4,  'title' => 'Galaxy-Tab-4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-tb-001.jpg' , 'price' => 899.99],
    ['category_id' => 2 , 'subcatgeory_id' => 8 , 'rating_cache' => 4,  'title' => 'Galaxy-Tab-S', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-tb-002.jpg' , 'price' => 799.99],
    ['category_id' => 2 , 'subcatgeory_id' => 8 , 'rating_cache' => 3,  'title' => 'Galaxy-Tab-3', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/ss-tb-003.jpg' , 'price' => 399.99],  
    
    ['category_id' => 3 , 'subcatgeory_id' => 9 , 'rating_cache' => 5,  'title' => 'LG-G-Flex-2', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/lg-p-001.jpg' , 'price' => 800.00],
    ['category_id' => 3 , 'subcatgeory_id' => 9 , 'rating_cache' => 3,  'title' => 'LG-G-3', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/lg-p-002.jpg' , 'price' => 620.99],
    ['category_id' => 3 , 'subcatgeory_id' => 9 , 'rating_cache' => 3,  'title' => 'LG-G-2', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/lg-p-003.jpg' , 'price' => 359.99],  
    
    ['category_id' => 3 , 'subcatgeory_id' => 10 , 'rating_cache' => 3,  'title' => 'LG-TV', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/lg-tv-001.jpg' , 'price' => 499.99],
    ['category_id' => 3 , 'subcatgeory_id' => 10 , 'rating_cache' => 4,  'title' => 'LG-TV-FULLHD-55', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/lg-tv-002.jpg' , 'price' => 2400.00],
    ['category_id' => 3 , 'subcatgeory_id' => 10 , 'rating_cache' => 4,  'title' => 'LG-TV-3D-Plasma-50', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/lg-tv-003.jpg' , 'price' => 5900.00],  
    
    
    // Lenovo
    ['category_id' => 4 , 'subcatgeory_id' => 11 , 'rating_cache' => 3,  'title' => 'Lenovo-Think-Pad', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/l-l-001.jpg' , 'price' => 1200.00],
    ['category_id' => 4 , 'subcatgeory_id' => 11 , 'rating_cache' => 3,  'title' => 'Lenovo-Think-Pad-2', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/l-l-002.jpg' , 'price' => 700.00],
    ['category_id' => 4 , 'subcatgeory_id' => 11 , 'rating_cache' => 5,  'title' => 'Lenovo-Think-Pad-3', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/l-l-003.jpg' , 'price' => 1400.00],
    ['category_id' => 4 , 'subcatgeory_id' => 11 , 'rating_cache' => 3,  'title' => 'Lenovo-Idea-Pad', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/l-l-004.jpg' , 'price' => 485.00],
    //
    ['category_id' => 5 , 'subcatgeory_id' => 12 , 'rating_cache' => 5,  'title' => 'Xiaomi-Note-Pro', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/x-p-001.jpg' , 'price' => 560.00],
    ['category_id' => 5 , 'subcatgeory_id' => 12 , 'rating_cache' => 3,  'title' => 'Xiaomi-Redmi-Note2', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/x-p-002.jpg' , 'price' => 280.00],
    ['category_id' => 5 , 'subcatgeory_id' => 12 , 'rating_cache' => 3,  'title' => 'Xiaomi-Mi4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/x-p-003.jpg' , 'price' => 450.00],
    
    ['category_id' => 6 , 'subcatgeory_id' => 14 , 'rating_cache' => 5,  'title' => 'Sony-Z5', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-p-001.jpg' , 'price' => 749.00],
    ['category_id' => 6 , 'subcatgeory_id' => 14 , 'rating_cache' => 3,  'title' => 'Sony-Z4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-p-002.jpg' , 'price' => 459.00],
    ['category_id' => 6 , 'subcatgeory_id' => 14 , 'rating_cache' => 4,  'title' => 'Sony-M5', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-p-003.jpg' , 'price' => 429.00],
    ['category_id' => 6 , 'subcatgeory_id' => 14 , 'rating_cache' => 3,  'title' => 'Sony-M4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-p-004.jpg' , 'price' => 369.00],
    ['category_id' => 6 , 'subcatgeory_id' => 14 , 'rating_cache' => 3,  'title' => 'Sony-C5', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-p-005.jpg' , 'price' => 389.00],
    ['category_id' => 6 , 'subcatgeory_id' => 14 , 'rating_cache' => 3,  'title' => 'Sony-C4', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-p-006.jpg' , 'price' => 329.00],
    
    ['category_id' => 6 , 'subcatgeory_id' => 15 , 'rating_cache' => 3,  'title' => 'Sony-Viao-3D', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-l-001.jpg' , 'price' => 1899.00],

    ['category_id' => 6 , 'subcatgeory_id' => 16 , 'rating_cache' => 4,  'title' => 'Sony-TV-LED-65-FULLHD', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-tv-002.jpg' , 'price' => 3799.00],
    ['category_id' => 6 , 'subcatgeory_id' => 16 , 'rating_cache' => 5,  'title' => 'Sony-TV-LED-60-FULLHD', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-tv-003.jpg' , 'price' => 3199.00],
    ['category_id' => 6 , 'subcatgeory_id' => 16 , 'rating_cache' => 3,  'title' => 'Sony-TV-LED-50-FULLHD', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-tv-004.jpg' , 'price' => 2699.00],
    ['category_id' => 6 , 'subcatgeory_id' => 16 , 'rating_cache' => 3,  'title' => 'Sony-TV-LED-48-FULLHD', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-tv-001.jpg' , 'price' => 1899.00],
    ['category_id' => 6 , 'subcatgeory_id' => 16 , 'rating_cache' => 3,  'title' => 'Sony-TV-LED-42-FULLHD', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-tv-005.jpg' , 'price' => 899.00],
    
    ['category_id' => 6 , 'subcatgeory_id' => 17 , 'rating_cache' => 5,  'title' => 'Sony-Xperia-Z4-Tab', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-tb-001.jpg' , 'price' => 545.00],
    ['category_id' => 6 , 'subcatgeory_id' => 17 , 'rating_cache' => 3,  'title' => 'Sony-SGPT', 'description' => 'This Product Is Sample', 'image' => 'uploads/images/s-tb-002.jpg' , 'price' => 299.00],   


       

    
   	]);       

    	$this->command->info('Products seeded!');
    }
}
