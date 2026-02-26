<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-500 pl-4 mb-4">Nuestras Especies Autóctonas</h2>
        <p class="text-gray-600 mb-10 max-w-3xl">Conoce los árboles que utilizamos en nuestras reforestaciones y los beneficios que aportan a nuestro ecosistema.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($especies as $especie)
                <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 flex flex-col">
                    <div class="h-56 bg-gray-200">
                        @if($especie->foto)
                            <img src="{{ asset('storage/' . $especie->foto) }}" alt="{{ $especie->nombre }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-green-50 text-green-400">Sin foto</div>
                        @endif
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $especie->nombre }}</h3>
                        <p class="text-sm italic text-gray-500 mb-4">{{ $especie->nombre_cientifico }}</p>

                        <ul class="text-sm text-gray-600 space-y-2 mb-4 flex-grow">
                            <li><span class="font-bold text-gray-800">Clima:</span> {{ $especie->clima }}</li>
                            <li><span class="font-bold text-gray-800">Origen:</span> {{ $especie->region_origen }}</li>
                            <li><span class="font-bold text-gray-800">Tiempo adulta:</span> {{ $especie->tiempo_adultez }}</li>
                        </ul>

                        <div class="bg-green-50 p-3 rounded border border-green-100 mb-4">
                            <span class="font-bold text-green-800 text-sm block mb-1">Beneficios:</span>
                            <p class="text-sm text-green-700">{{ $especie->beneficios_descripcion }}</p>
                        </div>

                        @if($especie->enlace_wiki)
                            <a href="{{ $especie->enlace_wiki }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center mt-auto">
                                Leer más en Wikipedia <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-500">
                    Aún no hay especies registradas en la base de datos.
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
