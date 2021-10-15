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
    <div class="grid grid-flow-row">

        <div class="flex justity-between bg-black bg-opacity-30 px-8 py-16 border-purple-700 border-opacity-60 border-2">
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
            <div class="bg-black bg-opacity-25 rounded-lg grid grid-flow-row shadow-2xl px-4 py-4 w-2/3">
                <div class="pb-4">
                    ( {{$movie->release_date->format('Y')}} )
                </div>

                <div class="flex grid-cols-2">
                    <x-label for="celebrity" value="Celebs:" class="text-lg font-bold pr-4"/>
                    @foreach ($movie->celebrities as $celebrity)
                    <a href="{{ route('test', $celebrity) }}">
                        <div class="px-2 border-grey-100 border-4 rounded-full">
                            {{$celebrity->name}}
                        </div>
                    </a>
                    @endforeach
                </div>
                <div class="flex grid-cols-2 py-4">
                    <div class="flex grid-cols-2">
                        <x-label for="genre" value="Genres:" class="text-lg font-bold pr-4"/>
                        @foreach ($movie->genres as $genre)
                        <a href="{{ route('genres.show', $genre) }}">
                            <div class="px-2 border-grey-100 border-4 rounded-full">
                                {{$genre->type}}
                            </div>
                        </a>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="border-grey-900 border-4 border-opacity-20 bg-grey-100 bg-opacity-10 py-4 px-4 w-2/5">
                {{$movie->blurb}}
            </div>

        </div>
    </div>
</x-app-layout>

