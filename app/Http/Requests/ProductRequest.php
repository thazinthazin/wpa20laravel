<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    { 

        // When Create Must Need Image <=> When Update Used Old Value -> No Need Validation
      
        switch($this->method())
        {

            case 'POST':
            {
                  return [        
                    'category_id' => 'required|integer',
                    'subcatgeory_id' => 'required|integer',
                    'title'=> 'required|min:4',
                    'description' => 'required',
                    'price' => 'required',
                    'image'=>'required|image|mimes:jpeg,jpg,png',   
                    'availability'=>'integer',
                    ];   
            }
            case 'PUT':
            case 'PATCH':
            {
                 return [        
                    'category_id' => 'required|integer',
                    'subcatgeory_id' => 'required|integer',
                    'title'=> 'required|min:4',
                    'description' => 'required',
                    'price' => 'required',                      
                    'availability'=>'integer',
                    ]; 
            }
            default:break;
        }
    }
}
