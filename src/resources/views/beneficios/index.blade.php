<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold text-green-800 mb-6">Listado de Beneficios Ecológicos</h2>

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 text-left font-bold text-gray-600 uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left font-bold text-gray-600 uppercase">Descripción</th>
                        <th class="px-6 py-3 text-right font-bold text-gray-600 uppercase">Acciones</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                    @foreach(\App\Models\Beneficio::all() as $beneficio)
                        <tr>
                            <td class="px-6 py-4 font-bold">{{ $beneficio->nombre }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $beneficio->descripcion }}</td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('beneficios.destroy', $beneficio) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:text-red-900 font-bold">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
