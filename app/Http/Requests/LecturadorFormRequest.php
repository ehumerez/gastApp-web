<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturadorFormRequest extends FormRequest
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
            'ci'           => 'required|numeric|unique:persona',
            'nombres'         => 'required|string|max:50',
            'apellido_paterno'           => 'required|string|max:50',
            'apellido_materno'  => 'required|string|max:50'
        ];
    }

    public function messages()
    {
        return [
            'ci.required' => "La cédula de identidad es obligatorio",
            'nombres.required' => "El nombre es obligatorio",
            'apellido_paterno.required' => "El apellido paterno es obligatorio",
            'apellido_materno.required' => "El apellido materno es obligatorio",
        ];
    }
}
