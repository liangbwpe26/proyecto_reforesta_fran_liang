<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permitimos que cualquier usuario logueado lo use
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'provincia' => 'required|string|max:100',
            'localidad' => 'required|string|max:100',
            'tipo_terreno' => 'required|string',
            'fecha' => 'required|date|after:today',
            'tipo_evento' => 'required|string',

            'imagen' => 'required|image|mimes:jpeg,png,jpg,webp|max:10000',

            'documento_pdf' => 'nullable|mimes:pdf|max:10240',
        ];
    }
}
