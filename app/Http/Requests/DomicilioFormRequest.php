<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomicilioFormRequest extends FormRequest
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
            'id_municipio' => 'required|numeric',
            'direccion' => 'required|string|max:255',
            'uv' => 'required|string|max:50',
            'manzana' => 'required|numeric',
            'lote' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'direccion.required' => "El campo DIRECCIÓN es obligatorio",
            'uv.required' => "El campo UV es obligatorio",
            'manzana.required' => "El campo MANZANA es obligatorio",
            'lote.required' => "El campo LOTE es obligatorio"
        ];
    }
}
