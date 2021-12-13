<?php

namespace App\Http\Requests\Admin\blog;

use Illuminate\Foundation\Http\FormRequest;

class editblogRequest extends FormRequest
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
            'title' => 'required|min:5',
            'content' => 'required|min:17',
        
        ];
    }
    
    public function messages()
    {

        return [
            'title.required' => 'Tên bài viết không được để rỗng',
            'title.min' => 'Tên bài viết không nhỏ hơn 5 kí tự',
            'content.required' => 'Nội Dung không được để rỗng',
            'content.min' => 'Nội dung không nhỏ hơn 10 kí tự',
          
           
        ];
         
    }
}
