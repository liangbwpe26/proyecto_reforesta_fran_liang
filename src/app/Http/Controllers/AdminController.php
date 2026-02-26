<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function eventosPendientes()
    {
        // Traemos solo los eventos no aprobados
        $eventos = Evento::where('aprobado', false)->with('anfitrion')->orderBy('fecha', 'asc')->get();
        return view('admin.eventos', compact('eventos'));
    }

    public function aprobarEvento(Evento $evento)
    {
        $evento->update(['aprobado' => true]);

        return back()->with('status', 'El evento ha sido aprobado y ya es visible en la página principal.');
    }
}
