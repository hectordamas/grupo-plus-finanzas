<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiariesRequest extends FormRequest
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
            'name.required' => 'El campo es requerido',
            'identification.required' => 'El Campo es requerido',
            'identification.unique' => "Ya se han identificado con este número, iténtalo con otro",
            'number.required' => 'El campo es requerido',
            'number.min' => 'El número de cuenta debe tener 20 digitos'   
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'identification' => 'required|unique:beneficiaries',
            'number' => 'required|min:20'
        ];
    }
}
