<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;


class validarRegistroComics extends FormRequest
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
            'cantidad-comic' => 'required|integer',
            'fecha-comic' => 'required',
            'id-comic' => 'required|min_digits:5',
            'nombre-comic' => 'required',
            'precio-compra-comic' => 'required|integer',
            'compañia-comic' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'cantidad-comic.required' => '*Campo obligatorio',
            'cantidad-comic.integer' => '*Solo se aceptan numeros',
            'fecha-comic.required' => '*Campo obligatorio',
            'id-comic.required' => '*Campo obligatorio',
            'id-comic.min_digits' => '*Se requiere mas de 4 numeros',
            'nombre-comic.required' => '*Campo obligatorio',
            'precio-compra-comic.required' => '*Campo obligatorio',
            'precio-compra-comic.integer' => '*Solo se aceptan numeros',
            'compañia-comic.required' => '*Campo obligatorio'
        ];
    }
}
