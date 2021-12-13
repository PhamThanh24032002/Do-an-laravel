<?php

namespace App\Http\Requests\Admin\Bannerpages;

use Illuminate\Foundation\Http\FormRequest;

class AddbannerRequest extends FormRequest
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
            'content' => 'required|min:2',
            'page' => 'unique:bannerpages',
            'other_image' => 'required',
        ];
    }
    public function messages()
    {

        return [
            'content.required' => 'Tên không được để rỗng',
            'content.min' => 'Tên không nhỏ hơn 5 kí tự',
            'page.unique' => "$this->page đã tồn tại,Vui lòng chọn page khác",
            'other_image.required' => 'Vui Lòng Chọn Ảnh',
        ];
         
    }
}
