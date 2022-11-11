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
        "TxtContraseña"=>"required|min:8",
        "TxtConfi"=>"required|min:8"
        ];
    }
    public function messages()
    {
        return[
            "TxtNombre.required" =>"El nombre es requerido",
            "TxtApellido.required"=>"El apellido es requerido",
            "TxtUsuario.required"=>"El Nombre de usuario es requerido",
            "TxtE-mail.required"=>"El E-mail es requerido",
            "TxtContraseña.required"=>"La contraseña es requerida",
            "TxtContraseña.min"=>"Solo se aceptan máximo 8 caracteres",
            "TxtE-mail.email" => "Solo se acepta formato e-mail",
            "TxtConfi.required"=>"La confirmacion es obligatoria",
            "TxtConfi.min"=>"Solo se aceptan máximo 8 caracteres",
        ];
    }
}