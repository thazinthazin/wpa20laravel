<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;
use Session;
use Input;


class CategoryController extends Controller
{
    //
    public function index()
    {
        // Get All Categories Data     
        $categories = Category::all();

        return view('ecomm.admin.categories.index', compact('categories'));
    }    

    
    public function store(CategoryRequest $request)
    {  
        // Validate In Request Form -> CategoryRequest

        // Create Category
        $categories = Category::insert($request->except('_token'));

        return redirect()->back()->with('flash_message', 'Category Created.');
    }

    public function show($id)
    {
        // No Need;
    }
    
    public function edit($id)
    {
        // Find Category With Id
        $categories = Category::find($id);        

        // View Category Edit
        return view('ecomm.admin.categories.edit', compact('categories'));
    }

    public function update($id, CategoryRequest $request)
    {
        // Validate In Request Form -> CategoryRequest      
        
        // Find Category With Id        
        $categories = Category::find($id);
        // Update Category
        $categories->name = $request->input('name');
        $categories->save();        

        return redirect()->back()->with('flash_message', 'Catgory Updated!');


    }

    public function destroy($id)
    {
        // Find Category With Id   
        $categories = Category::find($id);
        // Delete Sub_Category When Category Deleted
        $subcategories = SubCategory::where('category_id', '=' , $categories->id)->delete();
        // Delete Category
        $categories->delete();
        
        return redirect()->route('admin.categories.index')->with('warning_message', 'Category DELETED!');

    }
}
