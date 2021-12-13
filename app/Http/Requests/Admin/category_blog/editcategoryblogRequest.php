<?php

namespace App\Http\Requests\Admin\category_blog;

use Illuminate\Foundation\Http\FormRequest;

class editcategoryblogRequest extends FormRequest
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
            'name'=>'required|unique:blog_categories,name,'.request()->id
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được để rỗng',
            'name.unique'=>"Tên danh mục $this->name đã tồn tại, vui lòng chọn tên khác"
        ];
    }
}
