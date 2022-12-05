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
            'txtNombreComic' => 'required',
            'txtEdicionComic' => 'required',
            'txtCompañiaComic' => 'required',
            'txtCantidadComic' => 'required|numeric',
            // 'txtFechaComic' => 'required|date',
            'txtPrecioCompraComic' => 'required|numeric',
            'img' => 'required'
            // 'txtPrecioVentaComic' => 'required'
        ];
    }
}
