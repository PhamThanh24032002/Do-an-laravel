<?php

namespace App\Http\Requests\attribute\color;
use App\Models\color;
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
        // dd($this->all());
        return [
            'name'=>'required|unique:colors',
            'values'=>'required|unique:colors'
        ];
    }

    public function messages(){
        return[
            'name.required'=>'Tên màu bị trống',
            'name.unique'=>'Tên màu này đã tồn tại',
            'values.required'=>'Bạn chưa nhập mã màu',
            'values.unique'=>'Mã màu này đã tồn tại',
        ];
    }
}
