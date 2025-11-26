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

            <div class="mt-8 mb-8">
                @auth
                    {{-- 1. Mostrar Formulario de Reseña (Si está logueado) --}}
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">{{ __('Deja Tu Reseña') }}</h3>
                    <form method="POST" action="{{ route('reviews.store') }}" class="bg-white p-6 shadow-md rounded-lg">
                        @csrf

                        {{-- Campo oculto para saber a qué curso pertenece --}}
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <div class="mb-4">
                            <label for="rating" class="block text-sm font-medium text-gray-700">{{ __('Calificación (1-5)') }}</label>
                            <select id="rating" name="rating" required
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">Selecciona una calificación</option>
                                @for ($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }} estrellas</option>
                                @endfor
                            </select>
                            @error('rating')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block text-sm font-medium text-gray-700">{{ __('Comentario') }}</label>
                            <textarea id="comment" name="comment" rows="3" required 
                                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('comment') }}</textarea>
                            @error('comment')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                            {{ __('Enviar Reseña') }}
                        </button>
                    </form>
                @endauth

                @guest
                    {{-- 2. Mostrar Mensaje de Login (Si es invitado) --}}
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8" role="alert">
                        <p class="font-bold text-yellow-800">{{ __('¡Atención!') }}</p>
                        <p class="text-sm text-yellow-700">Para poder dejar una reseña, debes <a href="{{ route('login') }}" class="font-semibold underline hover:text-yellow-900">{{ __('Iniciar Sesión') }}</a> o <a href="{{ route('register') }}" class="font-semibold underline hover:text-yellow-900">{{ __('Registrarte') }}</a>.</p>
                    </div>
                @endguest
            </div>

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