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
        <div class="grid grid-cols-3 gap-4">
            @foreach ($movies as $movie)
                <a href="{{ route('movies.show', $movie) }}" class="justify-center space-y-1">
                    <div class="items-center justify-center">
                        <img src="{{ url($movie->poster) }}" alt="poster" class="object-cover w-1/2 mx-auto">
                    </div>

                    <div class="text-center">
                        <div class="font-bold flex-wrap">
                            {{ $movie->title }}
                        </div>
                        <div class="text-xs">
                            ( {{$movie->release_date->format('Y')}} )
                        </div>
                    </div>

                </a>
            @endforeach
        </div>
        {{$movies->links()}}
    </div>
</x-app-layout>
