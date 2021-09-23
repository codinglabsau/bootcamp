<x-guest-layout>
    <x-slot name="header">
        Movie Profile Page
    </x-slot>
    <div class="flex grid">
        <div>
            {{$movie->title}} : Title
        </div>

        <div>
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

        <div>


        <form method="POST">
            @csrf
            @method('DELETE')
        <button> DELETE </button>
        </form>
    </div>
</x-guest-layout>

