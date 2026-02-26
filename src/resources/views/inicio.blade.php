<x-app-layout>
    <div class="relative w-full h-[500px] bg-cover bg-center flex items-center justify-center" style="background-image: url('https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-green-900/60"></div>
        <div class="relative z-10 text-center text-white px-4">
            <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-4 drop-shadow-lg">Re-Fores-Ta</h1>
            <p class="text-xl md:text-2xl font-light mb-8 max-w-2xl mx-auto drop-shadow-md">Únete a la recuperación de nuestros bosques autóctonos.</p>
            @auth
                <a href="{{ route('eventos.create') }}" class="bg-green-500 hover:bg-green-400 text-white font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105">Proponer Evento</a>
            @else
                <a href="{{ route('register') }}" class="bg-white text-green-800 hover:bg-gray-100 font-bold py-3 px-8 rounded-full shadow-lg transition transform hover:scale-105">Únete a la comunidad</a>
            @endauth
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800 border-l-4 border-green-500 pl-4">Próximas Reforestaciones</h2>
        </div>

        @if(session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('status') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($eventos as $evento)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-2xl transition duration-300 overflow-hidden flex flex-col border border-gray-100">
                    <div class="h-48 w-full bg-gray-200 relative">
                        @if($evento->imagen)
                            <img src="{{ asset('storage/' . $evento->imagen) }}" alt="{{ $evento->nombre }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-green-50 text-green-300">Sin imagen</div>
                        @endif
                        <div class="absolute top-0 right-0 bg-green-600 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                            {{ $evento->fecha->format('d/m/Y') }}
                        </div>
                    </div>

                    <div class="p-5 flex flex-col flex-grow">
                        <span class="text-xs font-semibold text-green-600 uppercase tracking-wider mb-1">{{ $evento->provincia }} - {{ $evento->localidad }}</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $evento->nombre }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">{{ $evento->descripcion }}</p>

                        <a href="{{ route('eventos.show', $evento) }}" class="mt-auto w-full text-center bg-gray-900 hover:bg-gray-800 text-white font-medium py-2 px-4 rounded-lg transition">
                            Ver detalles
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-gray-500 bg-gray-50 rounded-xl">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <p class="text-lg">Aún no hay eventos programados o aprobados.</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
