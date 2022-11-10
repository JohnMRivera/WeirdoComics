<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class validarRegistroArticulos extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fecha-arti' => 'required',
            'id-arti' => 'required|min_digits:5',
            'nombre-arti' => 'required',
            'precio-compra-arti' => 'required|integer',
            'compañia-arti' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'fecha-arti.required' => '*Campo obligatorio',
            'id-arti.required' => '*Campo obligatorio',
            'id-arti.min_digits' => '*Se requiere mas de 4 numeros',
            'nombre-arti.required' => '*Campo obligatorio',
            'precio-compra-arti.required' => '*Campo obligatorio',
            'precio-compra-arti.integer' => '*Solo se aceptan numeros',
            'compañia-arti.required' => '*Campo obligatorio'
        ];
    }
}
