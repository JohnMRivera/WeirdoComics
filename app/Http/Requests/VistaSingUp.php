<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VistaSingUp extends FormRequest
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
        "TxtNombre"=>"required",
        "TxtApellido"=>"required",
        "TxtUsuario"=>"required",
        "TxtE-mail"=>"required|email",
        "TxtContraseña"=>"required",
        "TxtConfi"=>"required"
        ];
    }
    public function messages()
    {
        return[
            "TxtNombre.required" =>"El nombre es requerido",
            "TxtApellido.required"=>"El apellido es requerido",
            "TxtUsuario.required"=>"El Nombre de usuario es requerido",
            "TxtE-mail.required|email"=>"El E-mail es requerido",
            "TxtContraseña.required"=>"La contraseña es requerida",
            "TxtE-mail.email" => "Solo se acepta formato e-mail",

        ];
    }
}
