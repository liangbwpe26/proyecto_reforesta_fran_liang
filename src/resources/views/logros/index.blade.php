<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-2">Nuestro Impacto Global</h2>
        <p class="text-gray-600 mb-8 text-lg">Estadísticas y beneficios logrados gracias a nuestras reforestaciones.</p>

        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 mb-10">
            <form action="{{ route('logros.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Año</label>
                    <select name="anio" class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500">
                        <option value="">Todos los tiempos</option>
                        @foreach($aniosDisponibles as $anio)
                            <option value="{{ $anio }}" {{ $filtroAnio == $anio ? 'selected' : '' }}>{{ $anio }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Localidad</label>
                    <select name="localidad" class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500">
                        <option value="">Todas las localidades</option>
                        @foreach($localidadesDisponibles as $loc)
                            <option value="{{ $loc }}" {{ $filtroLocalidad == $loc ? 'selected' : '' }}>{{ $loc }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Buscar por Beneficio</label>
                    <input type="text" name="beneficio" value="{{ $filtroBeneficio }}" placeholder="Ej: agua, temperatura..." class="w-full rounded-lg border-gray-300 focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow transition">Aplicar Filtros</button>
                </div>
            </form>
        </div>

        <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-2xl shadow-xl p-8 text-center text-white mb-10 transform hover:scale-[1.01] transition">
            <h3 class="text-2xl font-semibold mb-2">Árboles Reforestados Totales</h3>
            <p class="text-7xl font-extrabold">{{ $totalArboles ?? 0 }}</p>
            <p class="mt-4 text-green-100">Cada árbol cuenta para restaurar nuestro ecosistema.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6">
                <h3 class="text-xl font-bold text-gray-800 border-b pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                    Árboles por Especie
                </h3>
                <ul class="space-y-3">
                    @forelse($arbolesPorEspecie as $stat)
                        <li class="flex justify-between items-center text-gray-700">
                            <span class="font-medium">{{ $stat->nombre }}</span>
                            <span class="bg-green-100 text-green-800 py-1 px-3 rounded-full text-sm font-bold">{{ $stat->total }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500 italic">No hay datos para mostrar.</li>
                    @endforelse
                </ul>
            </div>

            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6">
                <h3 class="text-xl font-bold text-gray-800 border-b pb-3 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Reforestaciones por Localidad
                </h3>
                <ul class="space-y-3">
                    @forelse($arbolesPorUbicacion as $stat)
                        <li class="flex justify-between items-center text-gray-700">
                            <span class="font-medium">{{ $stat->localidad }}</span>
                            <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-sm font-bold">{{ $stat->total }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500 italic">No hay datos para mostrar.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
