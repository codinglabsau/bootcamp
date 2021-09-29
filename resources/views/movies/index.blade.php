<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Movies') }}
                </h2>
            </div>

            <div>
                <a href="{{ route('movies.create') }}">
                    <button> Add</button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="pl-8 pt-2 pb-2">
        @foreach ($movies as $movie)
            <div class="flex grid grid-cols-2">
                <a href="{{ route('movies.show', $movie) }}" class="flex grid gap-2 grid-cols-2">
                    <div class="w-12 h-24">
                        <img src="{{ url($movie->poster) }}" alt="poster">
                    </div>

                    <div class="justify-self-start">
                        {{ $movie->title }}
                    </div>
                </a>
                <div>
                    ( {{$movie->release_date->format('Y')}} )
                </div>

            </div>

        @endforeach
        {{$movies->links()}}
    </div>
</x-app-layout>
