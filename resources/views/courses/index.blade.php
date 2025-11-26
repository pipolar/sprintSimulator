<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administración de Cursos') }}
        </h2>
        {{-- Enlace rápido para la creación --}}
        <a href="{{ route('courses.create') }}" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow transition ease-in-out duration-150">
            + Crear Nuevo Curso
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Mostrar mensaje de éxito de la redirección --}}
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instructor</th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                                    <th class="px-6 py-3 bg-gray-50">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($courses as $course)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $course->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->instructor }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $course->slug }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{-- Botón de Edición --}}
                                            <a href="{{ route('courses.edit', $course) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>

                                            {{-- Formulario de Eliminación --}}
                                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este curso?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>