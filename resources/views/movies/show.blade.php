<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __($movie->title) }}
                </h2>
            </div>

            <div class="flex grid grid-cols-2">
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
    <div class="flex grid">
        <div class="flex grid grid-cols-2">
            <div>
                <img src="{{ url($movie->poster) }}" alt="poster"> Poster
            </div>
            <div>
                <iframe width="420" height="315"
                        src="{{$movie->trailer}}">
                </iframe>
            </div>
        </div>

        <div>
            <div>
                <div>
                    {{$movie->release_date}}
                </div>

            </div>
            <div>
                {{$movie->blurb}}
            </div>
            <div>
                <x-label for="celebrity" value="Celebs"/>
                @foreach ($movie->celebrities as $celebrity)
                <a href="{{ route('test', $celebrity) }}" class="flex grid gap-2 grid-cols-2">
                    <div>
                        {{$celebrity->name}}
                    </div>
                </a>
                @endforeach
            </div>
            <div>
                <x-label for="genre" value="Genres"/>
                @foreach ($movie->genres as $genre)
                <a href="{{ route('genres.show', $genre) }}" class="flex grid gap-2 grid-cols-2">
                    <div>
                        {{$genre->type}}
                    </div>
                </a>

                @endforeach

            </div>
        </div>
    </div>
</x-app-layout>

