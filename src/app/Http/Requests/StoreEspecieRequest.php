<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEspecieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'nombre' => 'required|string|max:100',
            'nombre_cientifico' => 'required|string|italic',
            'clima' => 'required|string',
            'region_origin' => 'required|string',
            'tiempo_adultez' => 'required|string',
            'beneficios_descripcion' => 'required|string',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validación de imagen
            'enlace_wiki' => 'nullable|url',
        ];
    }
}
