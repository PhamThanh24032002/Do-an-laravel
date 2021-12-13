<?php

namespace App\Http\Requests\attribute\size;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'name'=>'required|unique:sizes',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Tên kích cỡ bị trống',
            'name.unique'=>'Tên kích cỡ này đã tồn tại',
        ];
    }
}
