<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Message;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class validarProveedor extends FormRequest
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
            'nom-empresa' => 'required',
            'direccion' => 'required',
            'pais' => 'required',
            'contacto' => 'required',
            'no-fijo' => 'required|min_digits:10',
            'no-celular' => 'required|min_digits:10',
            'correo' => 'required|email',
        ];
    }
    public function messages()
    {
        return [
            'nom-empresa.required' => '*Campo obligatorio',
            'direccion.required' => '*Campo obligatorio',
            'pais.required' => '*Campo obligatorio',
            'contacto.required' => '*Campo obligatorio',
            'no-fijo.required' => '*Campo obligatorio',
            'no-celular.required' => '*Campo obligatorio',
            'correo.required' => '*Campo obligatorio',
            'no-fijo.min_digits' => '*Verifica que tu numero sea valido',
            'no-celular.min_digits' => '*Verifica que tu numero sea valido',
            'correo.email' => '*Verifica que sea un correo valido'
        ];
    }
}
