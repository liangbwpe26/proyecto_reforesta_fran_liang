<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Evento;
use App\Models\Especie;
use Carbon\Carbon;

class LogroController extends Controller
{
    public function index(Request $request)
    {
        // Filtro por defecto: el último año (como pide el PDF)
        $filtroAnio = $request->input('anio', Carbon::now()->subYear()->year);
        $filtroLocalidad = $request->input('localidad');
        $filtroBeneficio = $request->input('beneficio');

        // Construimos la consulta base uniendo las tablas necesarias
        $query = DB::table('evento_especie')
            ->join('eventos', 'evento_especie.evento_id', '=', 'eventos.id')
            ->join('especies', 'evento_especie.especie_id', '=', 'especies.id')
            ->where('eventos.aprobado', true);

        // Aplicamos los filtros
        if ($filtroAnio) {
            $query->whereYear('eventos.fecha', $filtroAnio);
        }

        if ($filtroLocalidad) {
            $query->where('eventos.localidad', 'like', '%' . $filtroLocalidad . '%');
        }

        if ($filtroBeneficio) {
            $query->where('especies.beneficios_descripcion', 'like', '%' . $filtroBeneficio . '%');
        }

        // Calculamos las estadísticas
        $totalArboles = $query->sum('evento_especie.cantidad');

        $arbolesPorEspecie = (clone $query)
            ->select('especies.nombre', DB::raw('SUM(evento_especie.cantidad) as total'))
            ->groupBy('especies.nombre')
            ->get();

        $arbolesPorUbicacion = (clone $query)
            ->select('eventos.localidad', DB::raw('SUM(evento_especie.cantidad) as total'))
            ->groupBy('eventos.localidad')
            ->get();

        // Obtenemos listas para los selectores del filtro
        $aniosDisponibles = Evento::selectRaw('YEAR(fecha) as anio')->distinct()->pluck('anio');
        $localidadesDisponibles = Evento::select('localidad')->distinct()->pluck('localidad');

        return view('logros.index', compact(
            'totalArboles',
            'arbolesPorEspecie',
            'arbolesPorUbicacion',
            'aniosDisponibles',
            'localidadesDisponibles',
            'filtroAnio',
            'filtroLocalidad',
            'filtroBeneficio'
        ));
    }
}
