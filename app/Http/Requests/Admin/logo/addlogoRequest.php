<?php

namespace App\Http\Requests\Admin\logo;

use Illuminate\Foundation\Http\FormRequest;

class addlogoRequest extends FormRequest
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
           
            'other_image' => 'required',
        ];
    }
    
    public function messages()
    {

        return [
            'other_image.required' => 'Vui Lòng Chọn Ảnh',
           
        ];
         
    }
}
