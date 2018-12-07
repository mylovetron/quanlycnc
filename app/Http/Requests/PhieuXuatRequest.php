<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuXuatRequest extends FormRequest
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
            'txtMaVattu'=>'required|unique:phieuxuat,mavattu'
        ];
    }

    public function messages(){
        return[
            'txtMavattu.required' =>'Phải nhập mã vật tư',
            //'txtMavattu.unique' =>'Mã vật tư này đã tồn tại'
        ];
    }
}
