<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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

    public function message(){
        return [
            'number.unique' => 'Este número ya ha sido registrado',
        ];
    }
    public function rules()
    {
        return [
            'number' => 'unique:accounts',
        ];
    }
}
