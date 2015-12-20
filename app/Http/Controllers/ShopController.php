<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Review;
use Input;
use View;
use Sentinel;
use DB;
use App\Color;
use App\Size;

class ShopController extends Controller
{

    public function index()
    {   

        $categories = Category::all();

        $sub_categories = SubCategory::all();                    

        //Products For Filter By Price, Color, Sizes, Category(brand)
        $products = Product::with('colors', 'sizes')       
        //For Colors Filter
        ->whereHas('colors', function($query)
        {
            $colors = Input::has('colors') ? Input::get('colors') : null ; 
          
            if(isset($colors))
            {
               $query->where('name', '=', $colors);
            } 
        })
        //For Sizes Filter
        ->whereHas('sizes', function($query){
            
            $sizes = Input::has('sizes') ? Input::get('sizes') : null ;

            if(isset($sizes))
            {
               $query->where('name', '=', $sizes);
            }
        })
        //For Price Range and Brand Filter
        ->where(function($query){

            $min_price = Input::has('min_price') ? Input::get('min_price') : null;
            $max_price = Input::has('max_price') ? Input::get('max_price') : null;
            $brands = Input::has('brands') ? Input::get('brands') : [];            

            if(isset($min_price) && isset($max_price))
            {

                if(isset($brands))
                {
                    foreach ($brands as $brand) {
                        $query->orwhere('price', '>=' , $min_price)
                        ->where('price', '<=' , $max_price)
                        ->where('category_id', '=' , $brand);
                    }
                }                              


                $query->where('price', '>=' , $min_price)
                ->where('price', '<=' , $max_price);

            }
            if(isset($brands))
            {
                foreach ($brands as $brand) {
                    $query->orwhere('category_id', '=' , $brand);
                }
            }           
        
        })
        // Disable Products Can't See And Order By Rating
        ->where('availability' , '=', 1)->take(12)->orderBy('rating_cache', 'DESC')->get();   

        return view('ecomm.shop.index', compact('products', 'categories', 'sub_categories')); 

        }

        public function show($id)
        {
            // If Product Id Not Have 404 error
            if(Product::find($id)) {
                // Find Product By Id
                $product  = Product::where('availability', '=' , 1)->find($id);
                // Show Products Review
                $reviews = $product->reviews()->with('user')->orderBy('created_at','desc')->paginate(5);

                return view('ecomm.shop.products.details', compact('product', 'reviews'));
            } else {
                abort(404);
            }


        }    

        public function addReview($id)
        {

            // Defint Rating
            $i = Input::get('rating');
            // Review Must ONLY 1 to 5 number
            if((int) $i > 0 && (int) $i < 6) {
            // Input Rating And Comment
            $input = array(
                'comment' => Input::get('comment'),
                'rating'  => $i,
                );
            } else {
                abort(404);
            }
            // Create New Review
            $review = new Review;
            // Save Review With Input
            $review->storeReviewForProduct($id, $input['comment'], $input['rating']);

            return redirect()->route('shop_product_show', $id);
        }

        public function getCategory()
        {  
            // Define Categories
            $categories = Category::all();            

            return view('ecomm.shop.categories.index', compact('categories' ));
        }

        public function showCategory($id)
        {
            // If Category Id Not Have 404 error
            if(Category::find($id)) {
            // Define Category Id With Subcategories and Products
            $category = Category::with('subcategories', 'products')->find($id);                  

            return view('ecomm.shop.categories.details', compact('category'));

         } else {

            abort(404);
        }
    }

    public function showSubCategory($id)
    {
        // If SubCategory Not Have 404 error
        if(SubCategory::find($id)) {
            // Define SubCategory Id With Products
            $subcategory = SubCategory::with('products')->find($id);           
            // Define Enable Products With SubCategory
            $sub_product = Product::where('subcatgeory_id', '=' , $subcategory->id)->where('availability', '=' , 1)->get();            
            
            return view('ecomm.shop.subcategories.details', compact('subcategory', 'sub_product'));
            
        } else {
            abort(404);
        } 

    }

    public function getResults(Request $request)
    {
        // Define Search Input
        $query = $request->input('query');
        if (!$query) {
            return redirect()->route('shop_home');
        }
        // Search Products Title and Description
        $products = Product::where(DB::raw("CONCAT(title)"), 'LIKE', "%{$query}%")
                                ->orWhere('description', 'LIKE', "%{$query}%")
                                ->get();

        return view('ecomm.shop.search.results', compact('products'));
    }


}
