<x-app-layout>
    <div class="max-w-5xl mx-auto px-4 py-12">

        @if(session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                <p class="font-bold">¡Éxito!</p>
                <p>{{ session('status') }}</p>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded shadow-sm" role="alert">
                <p>{{ session('error') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row border border-gray-100">
            <div class="md:w-1/2">
                @if($evento->imagen)
                    <img src="{{ asset('storage/' . $evento->imagen) }}" alt="{{ $evento->nombre }}" class="w-full h-full object-cover min-h-[300px]">
                @else
                    <div class="w-full h-full min-h-[300px] flex items-center justify-center bg-green-50 text-green-400">Sin imagen</div>
                @endif
            </div>

            <div class="md:w-1/2 p-8 flex flex-col justify-between">
                <div>
                    <div class="flex justify-between items-start">
                        <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full uppercase">{{ $evento->tipo_evento }}</span>
                        <span class="text-gray-500 text-sm font-medium">{{ $evento->fecha->format('d/m/Y H:i') }}</span>
                    </div>

                    <h1 class="text-3xl font-extrabold text-gray-900 mt-4 mb-2">{{ $evento->nombre }}</h1>

                    <div class="flex items-center text-gray-600 text-sm mb-6">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        {{ $evento->localidad }}, {{ $evento->provincia }}
                    </div>

                    <p class="text-gray-700 leading-relaxed mb-6">{{ $evento->descripcion }}</p>

                    <div class="bg-gray-50 rounded-lg p-4 border border-gray-100 mb-6">
                        <p class="text-sm text-gray-600"><span class="font-bold text-gray-900">Anfitrión:</span> {{ $evento->anfitrion->name }} ({{ $evento->anfitrion->nick }})</p>
                        <p class="text-sm text-gray-600 mt-2"><span class="font-bold text-gray-900">Terreno:</span> {{ $evento->tipo_terreno }}</p>
                        <p class="text-sm text-gray-600 mt-2"><span class="font-bold text-gray-900">Voluntarios apuntados:</span> {{ $evento->participantes->count() }}</p>
                    </div>
                </div>

                @auth
                    @if($evento->participantes->contains(auth()->id()))
                        <button disabled class="w-full bg-gray-300 text-gray-600 font-bold py-3 px-4 rounded-lg cursor-not-allowed">
                            Ya estás participando en este evento
                        </button>
                    @else
                        <form action="{{ route('eventos.unirse', $evento) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-4 rounded-lg shadow-lg transition transform hover:-translate-y-1">
                                Unirme al Evento (+3 Karma)
                            </button>
                        </form>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="block text-center w-full bg-gray-800 hover:bg-gray-900 text-white font-bold py-3 px-4 rounded-lg transition">
                        Inicia sesión para unirte
                    </a>
                @endauth
            </div>
        </div>
    </div>
</x-app-layout>
