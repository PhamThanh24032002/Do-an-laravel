<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class EditRequest extends FormRequest
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
        return [
            'name' => [
                'required',                
                Rule::unique('products')->where(function($query) {
                  $query->where('display', '=', '1');
              })->ignore($this->id)
            ],
            'price'=>'required',        
            // 'image'=>'required',
            // 'images'=>'required',
            'category_id'=>'required',
            'color'=>'required',
            'size'=>'required',
            'desscription'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name not null',
            'name.unique'=>"$this->name has existed",
            'price.required'=>'Price not null',
            'image.required'=>'Image not null',
            'images.required'=>'Relate Photos not null',
            'category_id.required'=>'Image not null',
            'color.required'=>'color not null',
            'size.required'=>'size not null',
            'desscription.required'=>'desscription not null',
        ];
        
    }
}
