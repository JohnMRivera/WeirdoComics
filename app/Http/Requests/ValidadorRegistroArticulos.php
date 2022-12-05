<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorRegistroArticulos extends FormRequest
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
            // 'txtNombreArticulo' => 'required',
            'txtTipoArticulo' => 'required',
            'txtMarcaArticulo' => 'required',
            'txtDescripcionArticulo' => 'required',
            'txtCantidadArticulo' => 'required|numeric',
            // 'txtFechaArticulo' => 'required|date',
            'txtPrecioCompraArticulo' => 'required',
            // 'txtPrecioVentaArticulo' => 'required'
        ];
    }
}
