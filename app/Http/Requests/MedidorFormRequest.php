<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedidorFormRequest extends FormRequest
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
            'consumo_m3' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'consumo_m3.required' => "El campo consumo es obligatorio",
            'consumo_m3.numeric' => "El campo consumo debe ser sólo numérico"
        ];
    }
}
