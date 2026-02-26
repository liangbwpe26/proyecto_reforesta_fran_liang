<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;

class EventoController extends Controller
{
    // Muestra la cuadrícula de la página principal
    public function index()
    {
        // Ordenados descendentemente por fecha como pide el PDF [cite: 9]
        $eventos = Evento::where('aprobado', true)->orderBy('fecha', 'desc')->get();
        return view('inicio', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    // Alta de eventos [cite: 38, 43]
    public function store(StoreEventoRequest $request)
    {
        // Obtenemos los datos ya validados por el StoreEventoRequest
        $datos = $request->validated();

        // Gestión de la Imagen del Evento
        if ($request->hasFile('imagen')) {
            // Guardamos en 'public/eventos' y actualizamos el array de datos
            $datos['imagen'] = $request->file('imagen')->store('eventos', 'public');
        }

        // Gestión del Documento PDF (Requisito adicional del proyecto)
        if ($request->hasFile('documento_pdf')) {
            $datos['documento_pdf'] = $request->file('documento_pdf')->store('documentos', 'public');
        }

        // Datos de auditoría y estado
        $datos['anfitrion_id'] = auth()->id();
        $datos['aprobado'] = false; // Requiere validación del admin para aparecer en la home

        // Persistencia en la base de datos
        $evento = Evento::create($datos);

        // Sistema de recompensas: sumar karma al usuario
        auth()->user()->increment('karma', 4);

        return redirect()->route('inicio')->with('status', 'Evento propuesto con éxito (+4 Puntos de Karma). Pendiente de aprobación.');
    }

    // Consulta de detalles de eventos [cite: 40, 56]
    public function show(Evento $evento)
    {
        // Cargamos a los usuarios que se han unido [cite: 51]
        $evento->load('participantes', 'anfitrion');
        return view('eventos.show', compact('evento'));
    }

    // Funcionalidad: Unirse a un evento [cite: 32]
    public function unirse(Evento $evento)
    {
        $user = auth()->user();

        // Verificamos que no esté ya unido
        if (!$evento->participantes()->where('user_id', $user->id)->exists()) {
            $evento->participantes()->attach($user->id);

            // Participar en un evento suma 3 puntos
            $user->increment('karma', 3);

            return back()->with('status', '¡Te has unido al evento! (+3 Puntos de Karma)');
        }

        return back()->with('error', 'Ya estás apuntado a este evento.');
    }
}
