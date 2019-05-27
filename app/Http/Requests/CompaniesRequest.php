<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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

    public function messages(){
        return [
            'number.unique' => 'Este número de cuenta ya ha sido registrado anteriormente'
        ]; 
    }
    public function rules()
    {
        return [
            'number' => 'required|unique:accounts'
        ];
    }
}
