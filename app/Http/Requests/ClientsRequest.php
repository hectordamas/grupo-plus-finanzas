<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsRequest extends FormRequest
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
    public function messages(){
        return [
            'name.required' => 'El campo es requerido.',
            'rif.required' => 'El campo es requerido.',
            'rif.min' => 'El número de RIF debe tener 10 digitos.',
            'rif.unique' => 'Este número de RIF ya ha sido registrado',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'rif' => 'required|unique:clients|min:10',
        ];
    }
}
