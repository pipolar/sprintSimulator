<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">{{ __('Todos Nuestros Cursos') }}</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($courses as $course)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 hover:shadow-xl transition duration-300">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-2">{{ $course->title }}</h2>
                        <p class="text-sm text-gray-600 mb-4">{{ __('Instructor:') }} {{ $course->instructor }}</p>
                        
                        {{-- Muestra una parte de la descripción --}}
                        <p class="text-gray-700 mb-4">{{ Str::limit($course->description, 100) }}</p>

                        <a href="{{ route('courses.show', $course->slug) }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                            {{ __('Ver Detalles y Reseñas') }}
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                    </div>
                @endforeach
            </div>

            @if ($courses->isEmpty())
                <p class="text-gray-500">{{ __('Aún no hay cursos registrados.') }}</p>
            @endif

        </div>
    </div>
</x-guest-layout>