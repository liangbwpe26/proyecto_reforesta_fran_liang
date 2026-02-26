<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 border border-gray-100">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-gray-900">Contacta con nosotros</h2>
                <p class="mt-4 text-lg text-gray-600">¿Tienes dudas sobre un evento, quieres proponer una alianza o reportar un problema? Escríbenos.</p>
            </div>

            @if(session('status'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded shadow-sm" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('contacto.enviar') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre completo</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" required>
                        @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" required>
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mensaje</label>
                    <textarea name="mensaje" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="text-right">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-lg shadow-md transition transform hover:-translate-y-1">
                        Enviar Mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
