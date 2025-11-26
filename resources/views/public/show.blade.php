<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8 mb-8">
                <h1 class="text-4xl font-extrabold text-gray-900 mb-2">{{ $course->title }}</h1>
                <p class="text-lg text-indigo-600 mb-6">{{ __('Instructor:') }} {{ $course->instructor }}</p>
                
                <h2 class="text-2xl font-semibold text-gray-800 mt-6 mb-3">{{ __('Descripción del Curso') }}</h2>
                <p class="text-gray-700 whitespace-pre-wrap">{{ $course->description }}</p>
            </div>
            
            {{-- BLOQUE DE RESEÑAS --}}
            <h2 class="text-3xl font-bold text-gray-800 mb-6">{{ __('Reseñas de Usuarios') }} ({{ $course->reviews->count() }})</h2>

            @forelse ($course->reviews as $review)
                <div class="bg-white shadow-sm sm:rounded-lg p-6 mb-4 border-l-4 border-indigo-500">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <p class="text-xl font-semibold text-gray-900">{{ $review->user->name }}</p>
                            <p class="text-sm text-gray-500">{{ __('Publicado el') }} {{ $review->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="flex items-center">
                            {{-- Mostrar estrellas de la calificación --}}
                            <span class="text-yellow-500 text-2xl font-bold">{{ $review->rating }}</span>
                            <span class="text-yellow-500 ml-1">⭐</span>
                        </div>
                    </div>
                    <p class="text-gray-800">{{ $review->comment }}</p>
                </div>
            @empty
                <p class="text-gray-500 p-6 bg-white shadow-sm sm:rounded-lg">{{ __('Sé el primero en dejar una reseña para este curso.') }}</p>
            @endforelse

        </div>
    </div>
</x-guest-layout>