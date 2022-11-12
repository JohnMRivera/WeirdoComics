<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorRegistroComics extends FormRequest
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
            'txtIdComic' => 'required|numeric',
            'txtNombreComic' => 'required',
            'txtCompañiaComic' => 'required',
            'txtCantidadComic' => 'required|numeric',
            'txtFechaComic' => 'required|fecha',
            'txtPrecioCompraComic' => 'required',
            'txtPrecioVentaComic' => 'required'
        ];
    }
}
