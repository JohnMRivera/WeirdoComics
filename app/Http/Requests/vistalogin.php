<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class vistalogin extends FormRequest
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
        "txtCorreo"=>"required|email",
        "txtContraseña"=> "required|max:8",

        ];
    }
    public function messages()
    {
        return[
        "txtCorreo.required"=>"El correo es requerido",
        "txtContraseña.required"=>"La contraseña es requerida",
        "txtCorreo.email"=>"Solo se acepta formato tipo e-mail",
        "txtContraseña.min"=>"Solo se aceptan máximo 8 caracteres",
        "txtCorreo.required"=>"El correo es requerido",
        ];

    }
}