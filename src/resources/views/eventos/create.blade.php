<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-12">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="bg-green-800 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Proponer Nueva Reforestación</h2>
                <p class="text-green-200 text-sm mt-1">Gana 4 puntos de Karma por registrar un nuevo evento.</p>
            </div>

            <form action="{{ route('eventos.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre del evento</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm" required>
                        @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Provincia</label>
                        <input type="text" name="provincia" value="{{ old('provincia') }}" class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm" required>
                        @error('provincia') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Localidad</label>
                        <input type="text" name="localidad" value="{{ old('localidad') }}" class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm" required>
                        @error('localidad') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Terreno</label>
                        <select name="tipo_terreno" class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm" required>
                            <option value="">Selecciona un terreno...</option>
                            <option value="Terrenos que han sufrido un incendio">Terrenos que han sufrido un incendio</option>
                            <option value="Colinas">Colinas</option>
                            <option value="Laderas">Laderas</option>
                            <option value="Sotos deteriorados de ríos">Sotos deteriorados de ríos</option>
                            <option value="Terrenos de cultivo abandonados">Terrenos de cultivo abandonados</option>
                            <option value="Taludes o terraplenes">Taludes o terraplenes</option>
                            <option value="Fincas privadas">Fincas privadas</option>
                            <option value="Terreno erosionado por otras causas">Terreno erosionado por otras causas</option>
                        </select>
                        @error('tipo_terreno') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Evento</label>
                        <select name="tipo_evento" class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm" required>
                            <option value="">Selecciona una acción...</option>
                            <option value="Recogida de semillas">Recogida de semillas</option>
                            <option value="Reforestación con árboles jóvenes">Reforestación con árboles jóvenes</option>
                            <option value="Reforestación desde semillas">Reforestación desde semillas</option>
                            <option value="Seguimiento de riego">Seguimiento de riego</option>
                        </select>
                        @error('tipo_evento') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fecha del Evento</label>
                        <input type="datetime-local" name="fecha" value="{{ old('fecha') }}" class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm" required>
                        @error('fecha') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Imagen del Evento</label>
                        <input type="file" name="imagen" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100" required>
                        @error('imagen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Descripción detallada</label>
                        <textarea name="descripcion" rows="4" class="w-full rounded-lg border-gray-300 focus:border-green-500 focus:ring-green-500 shadow-sm" required>{{ old('descripcion') }}</textarea>
                        @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-8 flex justify-end">
                    <a href="{{ route('inicio') }}" class="text-gray-500 hover:text-gray-700 font-medium py-2 px-4 mr-4">Cancelar</a>
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">Proponer Evento</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
