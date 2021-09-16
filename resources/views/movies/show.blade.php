<x-app-layout>
    <x-slot name="header">
        Movie Profile Page
    </x-slot>
    <div class="flex grid">
        <div>
            {{$movie->title}} : Title
        </div>

        <div>
            <div>
                <img src="{{ url($movie->poster) }}"> Poster
            </div>
            <div>
                <video src="{{ url($movie->trailer) }}"> Trailer
            </div>
        </div>

        <div>
            <div>
                {{$movie->release_date}} : Release Date
            </div>
            <div>
                {{$movie->blurb}} : Blurb
            </div>
        </div>

        <div>
            <a href="{{ route('movies.edit', $movie) }}">
                <button> EDIT </button>
            </a>
        </div>

        <form method="POST">
            @csrf
            @method('DELETE')
            <button> DELETE </button>
        </form>
    </div>
</x-app-layout>

