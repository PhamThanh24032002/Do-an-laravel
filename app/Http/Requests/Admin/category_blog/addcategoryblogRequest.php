<?php

namespace App\Http\Requests\Admin\category_blog;

use Illuminate\Foundation\Http\FormRequest;

class addcategoryblogRequest extends FormRequest
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
            'name'=>'required|min:5|max:25|unique:blog_categories'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên danh mục không được để rỗng',
            'name.min'=>'Tên danh mục không nhỏ hơn 5 kí tự',
            'name.max'=>'Tên danh mục không lớn hơn 25 kí tự',
            'name.unique'=>"Tên danh mục $this->name đã tồn tại, vui lòng chọn tên khác!!"
        ];
    }
}
