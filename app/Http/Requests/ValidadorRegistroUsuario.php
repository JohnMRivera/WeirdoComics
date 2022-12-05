<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorRegistroUsuario extends FormRequest
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
            'txtNombre' => 'required',
            'txtApellidoP' => 'required',
            'txtApellidoM' => 'required',
            'txtCorreo' => 'required|email',
            'txtContra' => 'required|min:8|min_digits:1',
            'txtConfirmarContra' => 'required',
            'txtRol' => 'required',
            'txtTelefono' => 'required'
        ];
    }
}