<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Movies') }}
                </h2>
            </div>

            @auth
                <div>
                    <a href="{{ route('movies.create') }}">
                        <button> Add</button>
                    </a>
                </div>
            @endauth

        </div>
    </x-slot>

    <div class="pl-8 pt-2 pb-2 divide-y divide-purple-600 divide-opacity-60 text-white">
        @foreach ($movies as $movie)
            <div class="flex grid grid-cols-2">
                <a href="{{ route('movies.show', $movie) }}" class="grid gap-2 grid-cols-2">
                    <div class="flex items-center w-12 h-24">
                        <img src="{{ url($movie->poster) }}" alt="poster">
                    </div>

                    <div class="self-center">
                        {{ $movie->title }}
                    </div>
                </a>
                <div class="self-center">
                    ( {{$movie->release_date->format('Y')}} )
                </div>

            </div>

        @endforeach
        {{$movies->links()}}
    </div>
</x-app-layout>
