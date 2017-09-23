<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            'apellido_materno'  => 'required|string|max:50',
            /*'direccion'  => 'required|string|max:255',
            'uv' => 'required|string|max:255',
            'manzana' => 'required|numeric',*/
        ];
    }

    public function messages()
    {
        return [
            'ci.required' => "La cédula de identidad es obligatorio",
            'nombres.required' => "El nombre es obligatorio",
            'apellido_paterno.required' => "El apellido paterno es obligatorio",
            'apellido_materno.required' => "El apellido materno es obligatorio",
            /*'direccion.required' => "La direccion es obligatorio",
            'uv.required' => "La UV es obligatorio",
            'manzana.required' => "El número de manzana es obligatorio",*/
        ];
    }
}
