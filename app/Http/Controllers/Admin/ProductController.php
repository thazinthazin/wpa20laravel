<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\SubCategory;
use App\Review;
use View;
use Redirect;
use Input;
use Validator;
use File;
use DB;
use Str;
use App\Color;
use App\Size;
use App\WishList;
use App\Cart;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Data From products table
        $products = Product::all();
        // Get Data From categoreis table
        $categories = Category::all();
        // When Product Instock 0 Auto Disable Product
        foreach (Product::all() as $product) {

          if ($product->instock <= 0) {
            $product->availability = 0;
            $product->save();
          }          
        }        

        return view('ecomm.admin.products.index', compact('products', 'categories'));
    }
   
    public function create()
    {

        // Get Data From categoreis table
        $categories = Category::all();      
        // View Product Create  With Categories
        return view('ecomm.admin.products.create', compact('categories'));                   
    }
  
    public function store(ProductRequest $request)
    {
       
        // Validate In Request Form -> ProductRequest            
        
        // Create New Product
        $product = new Product;

      	// upload the image //
        $file = $request->file('image');        
        $destination_path = 'uploads/images/';
        $filename = $file->getClientOriginalName();
        $file->move($destination_path, $filename);

      	// save image data into database //
        $product->image = $destination_path . $filename;
        // Define Category_id
        $product->category_id = $request->input('category_id');
        // Define SubCategory_id
        $product->subcatgeory_id = $request->input('subcatgeory_id');
        // Define Title
        $product->title = $request->input('title');
        // Define Description
        $product->description = $request->input('description');
        // Define Price
        $product->price = $request->input('price');
        // Product Save
        $product->save();
        // Define Colors / Not Define Auto Select [1] = null <=> This Conditional for Search !!!
        if($request->input('color_id'))
        {
        $product->colors()->attach($request->input('color_id'));
        } else 
        {
        $product->colors()->attach(1);
        }
        // Define Sizes / Not Define Auto Select [1] = null <=> This Conditional for Search !!!
        if($request->input('size_id'))
        {            
        $product->sizes()->attach($request->input('size_id'));
        } else
        {
        $product->sizes()->attach(1);
        }

        // Product Created Redirect....
        return redirect()->route('admin.products.index')->with('flash_message', 'Product Created');
        
    }

 
    public function show()
    {
    	// Not Need
    }

    public function edit($id)
    {
        // Get Data From categories table
        $categories = Category::all();    
        
        // Find Products With Id
        $products = Product::find($id);

        // This Method for Auto-Selected Old Catagories
        $categories_product = [];
        foreach ($categories as $category) {
            $categories_product[$category->id] = $products->category_id;
        }     
        
        // This Method for Auto-Selected Old Colors  
        $colors = [];
        foreach ($products->colors()->get() as $colors_show) {
            $colors[$colors_show->id] = $colors_show->id;
        }

        // This Method for Auto-Selected Old Sizes  
        $sizes = [];
        foreach ($products->sizes()->get() as $sizes_show) {
            $sizes[$sizes_show->id] = $sizes_show->id;
        }  		

        return view('ecomm.admin.products.edit', compact('categories', 'products', 'colors', 'sizes' , 'categories_product'));       
    }
  
    public function update($id, ProductRequest $request)
    {
       
       // Validate In Request Form -> ProductRequest

       // Find Product With Id
       $product = Product::find($id);

       // Product Image Name For Move File
       $product_name = (explode('uploads/images/', $product->image));

       // No Change Image Get Old Image
       if(!$request->hasFile('image')){
       
        $product->image = $product->image;       

       } else {
       
       // When Update Image -> Old Image Move Into Trashs      
        $filepath = public_path() . '/' . $product->image;
        $newfilepath = public_path() . '/' . 'uploads/trash/' . $product_name[1];        
        File::move($filepath, $newfilepath);
       
      // Update the image //
       $file = $request->file('image');            
       $destination_path = 'uploads/images/';
       $filename = $file->getClientOriginalName();
       $file->move($destination_path, $filename);
      // save image data into database //
       $product->image = $destination_path . $filename;
       }
       // Define Update Category_id
       $product->category_id = $request->input('category_id');
       // Define Update Sub_Category_id
       $product->subcatgeory_id = $request->input('subcatgeory_id');
       // Define Update Product Title
       $product->title = $request->input('title');
       // Define Update Product Description
       $product->description = $request->input('description');
       // Define Update Product Price
       $product->price = $request->input('price');
       // Product Updated
       $product->save();

       // Update Colors With [Old Value <-> New Value] With Sync <=> !!! Means Values Cannot Be Twice !!!
       if($request->input('color_id')){       	
       $product->colors()->sync($request->input('color_id'));       
       }else {
       // No Define Auto Select [1] and Delete Old Values
       $product->colors()->detach();
       $product->colors()->attach(1);	
       }
       // Update Sizes With [Old Value <-> New Value] With Sync <=> !!! Means Values Cannot Be Twice !!!
       if($request->input('size_id')){    
       $product->sizes()->sync($request->input('size_id'));
   	   } else {
   	   // No Define Auto Select [1] and Delete Old Values
   	   $product->sizes()->detach();
       $product->sizes()->attach(1);
   	   }


       return redirect()->route('admin.products.index')->with('flash_message', 'Product Updated!');
    }

    public function postAvaChange($id, Request $request)
    {    

      //Define Input availability
      $i = $request->input('availability');

      //Define Input Check Must Only 0 or 1
      if((int) $i == 0 || (int) $i == 1) {
      //Find Product And Update availability With Input
      $product = Product::find($id);     
      $product->availability = $i;
      $product->save();
      }
      return redirect()->back();
    }

    public function postInstockChange($id, Request $request)
    {    
      //Define Input instock
      $i = $request->input('instock');
      //Define Input Must Number
      if((int) $i) {
      //Find Product And Update Instock With Input
      $product = Product::find($id);    
      $product->instock = $product->instock + $i ;     
      $product->save();
      }

      return redirect()->back();

    }

    public function destroy($id)
    {
        // Find Product With Id
        $product = Product::find($id);

        // When Product Delete Aslo Delete In Users Wish_list
        $wishlist = WishList::where('product_id', '=' , $product->id)->delete();
        // When Product Delete Aslo Delete In Users Cart
        $cart = Cart::where('product_id', '=' , $product->id)->delete();
        // When Product Delete Aslo Delete Colors And Sizes in Pivot Tables     
        $product->colors()->detach();
        $product->sizes()->detach();

        // Product Image Name For Move File
       	$product_name = (explode('uploads/images/', $product->image));
        
        // When Delete Image -> Image Move Into Trashs             
        $filepath = public_path() . '/' . $product->image;
        $newfilepath = public_path() . '/' . 'uploads/trash/' . $product_name[1];        
        File::move($filepath, $newfilepath);
        
        $product->delete();

        return redirect()->back()->with('warning_message', 'Product DELETED!');
    }

}