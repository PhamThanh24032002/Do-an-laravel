<?php

namespace App\Http\Requests\attribute\color;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'=>'required|unique:colors,name,'.$this->id,
            'values'=>'required|unique:colors,values,'.$this->id
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Tên màu bị trống',
            'name.unique'=>"$this->name đã tồn tại",
            'values.required'=>'Giá trị bị trống',
            'values.unique'=>"Giá trị $this->value đã tồn tại",
        ];
    }
}
