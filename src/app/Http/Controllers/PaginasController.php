<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function about()
    {
        return view('paginas.about');
    }

    public function contacto()
    {
        return view('paginas.contacto');
    }

    public function enviarContacto(Request $request)
    {
        // Validación básica del formulario de contacto
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'mensaje' => 'required|string|min:10',
        ]);

        // Aquí iría la lógica para enviar el email (ej. Mail::to('admin@reforesta.com')->send(...))

        return back()->with('status', '¡Gracias por contactarnos! Hemos recibido tu mensaje y te responderemos pronto.');
    }
}
