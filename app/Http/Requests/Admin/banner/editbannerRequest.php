<?php

namespace App\Http\Requests\Admin\banner;

use Illuminate\Foundation\Http\FormRequest;

class editbannerRequest extends FormRequest
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
            'name' => 'required|min:5',
            'links' => 'required|min:5',
            'position' => 'required|min:1|numeric|gt:-1|max:5',

        ];
    }

    public function messages()
    {

        return [
            'name.required' => 'Tên không được để rỗng',
            'name.min' => 'Tên không nhỏ hơn 5 kí tự',
            'links.required' => 'Links không được để rỗng',
            'links.min' => 'Links không nhỏ hơn 5 kí tự',
            'position.required' => 'Vị Trí không được để rỗng',
            'position.numeric' => 'Vui Lòng Nhập Số từ 1-> 5',

            'position.min' => 'Vui Lòng Nhập Số từ 1-> 5',
            'position.max' => 'Vui Lòng Nhập Số từ 1-> 5',
            'position.unique' => 'Vui Lòng Nhập Số khác',


        ];
    }
}
