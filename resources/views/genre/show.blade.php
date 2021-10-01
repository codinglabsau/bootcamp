<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __($genre->type) }}
                </h2>
            </div>

            <div>
                {{-- create route to add genre movie relation --}}
                <button> Add Movie</button>
            </div>
            <div>
                {{-- create route to remove genre movie relation --}}
                <button> Delete Movie</button>
            </div>
        </div>
    </x-slot>

    <div class="pl-8 pt-2 pb-2">
        @foreach ($genre->movies as $movie)
            <div class="flex grid grid-cols-2">

                {{-- Add in route link to returnt to movie based on genre --}}
                <div>
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
            </div>
        @endforeach
        {{$movies->links()}}
    </div>
</x-app-layout>
