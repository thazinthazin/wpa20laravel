<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Controllers\Controller;
use App\Category;
use App\SubCategory;

class SubCategoryController extends Controller
{ 

    //----- All Of View Is Combine With Category -----//

    public function store(SubCategoryRequest $request)
    {

        // Validate In Request Form -> SubCategoryRequest       
       
        // Create SubCategory
        $sub_categories = SubCategory::insert($request->except('_token'));

        return redirect()->route('admin.categories.index')->with('flash_message', 'SubCategory Created.');
    }   
    
    public function update($id, SubCategoryRequest $request)
    {
        // Validate In Request Form -> SubCategoryRequest                

        // Find Sub_Cat With Id
        $sub_categories = SubCategory::find($id);
        // Update Sub_Cat
        $sub_categories->sub_name = $request->input('sub_name');
        $sub_categories->save();
        
        return redirect()->back()->with('flash_message', 'Sub_Catgory Updated');
    }
    
    public function destroy($id)
    {  
        // Find Sub_Cat With Id
        $sub_categories = SubCategory::find($id);
        // Delete Sub_Cat
        $sub_categories->delete();
        
        return redirect()->route('admin.categories.index')->with('warning_message', 'Sub_Catgory DELETED!');
    }
}