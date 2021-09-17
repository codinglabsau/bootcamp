<x-guest-layout>
    <a href="{{ route('movies.create') }}">
        <button> Add</button>
    </a>
    <div>
        <div
            class="container relative flex grid min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @foreach ($movies as $movie)
                <a href="{{ route('movies.show', $movie) }}">
                    {{ $movie->title }} : {{$movie->release_date}}
                </a>
            @endforeach
            {{$movies->links()}}
        </div>
    </div>
</x-guest-layout>


