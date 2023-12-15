<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Panel Administrativo') }}
            <a href="{{route('export') }}"  class="text-xs bg-gray-800 text-white rounded px-4 py-2" id="reporte">
                Reporte
            </a>
            <a href="{{ route('posts.create') }}" class="text-xs bg-gray-800 text-white rounded px-4 py-2">
                Crear
            </a>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="mb-4">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>materia</th>
                            </tr>
                        </thead>
                        @foreach ($posts as $post)
                            <tr class="border-b border-gray-200 text-sm">
                                <td class="px-6 py-4">{{ $post->identi }}</td>
                                <td class="px-6 py-4">{{ $post->nombre }}</td>
                                <td class="px-6 py-4">{{ $post->apellido }}</td>
                                <td class="px-6 py-4">{{ $post->correo }}</td>
                                <td class="px-6 py-4">{{ $post->celular }}</td>
                                <td class="px-6 py-4">{{ $post->materia }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600">Editar</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar"
                                            class="bg-gray-800 text-white rounded px-4 py-2"
                                            onclick="return confirm('Desea eliminar?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
