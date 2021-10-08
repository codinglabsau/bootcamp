<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div class="font-semibold text-2xl leading-tight">
                Review
            </div>
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __($movie->title) }}
                </h2>
            </div>
            @auth

            @endauth<div class="flex grid grid-cols-2">
                    <div>
                        <a href="{{ route('movies.edit', $movie) }}">
                            <button> EDIT </button>
                        </a>
                    </div>
                    <div>
                        <form method="POST">
                            @csrf
                            @method('DELETE')
                            <button> DELETE </button>
                        </form>
                    </div>
                </div>

        </div>


    </x-slot>
    <div class="grid grid-flow-row px-4 py-8">

        <div class="flex justity-between">
            <div class="px-2 w-1/3">
                <img src="{{ url($movie->poster) }}" alt="poster">
            </div>
            <div class="w-2/3">
                <iframe width="420" height="315"
                        class="w-full h-full"
                        src="{{$movie->trailer}}">
                </iframe>
            </div>
        </div>

        <div class="flex justify text-white text-lg font-bold py-8">
            <div class="border-pink-400 border-2 border-opacity-75 grid grid-flow-row px-4 py-4 w-2/3">
                <div class="pb-4">
                    ( {{$movie->release_date->format('Y')}} )
                </div>

                <div class="flex grid-cols-2">
                    <x-label for="celebrity" value="Celebs:" class="text-lg font-bold pr-4"/>
                    @foreach ($movie->celebrities as $celebrity)
                    <a href="{{ route('test', $celebrity) }}">
                        <div class="flex pr-16">
                            {{$celebrity->name}}
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="flex grid-cols-2 py-4">
                    <div>
                        <x-label for="genre" value="Genres:" class="text-lg font-bold pr-4"/>
                    </div>

                    <div>
                        @foreach ($movie->genres as $genre)
                        <a href="{{ route('genres.show', $genre) }}">
                            <div class="flex pr-16">
                                {{$genre->type}}
                            </div>
                        </a>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="border-pink-400 border-2 border-opacity-75 py-4 px-4 w-2/5">
                {{$movie->blurb}}
            </div>

        </div>
    </div>
</x-app-layout>

