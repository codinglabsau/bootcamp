<x-app-layout>
    <x-slot name="header">
        Celebrities Page
    </x-slot>
        <a href="{{ route('celebrities.create') }}">
            <button> Add </button>
        </a>
        <div class="relative flex grid min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @foreach ($celebrities as $celebrity)
            <ul>
                <li>
                    <a href="{{ route('celebrities.show', $celebrity) }}">
                        {{ $celebrity->name }} :
                    </a>
                    <div>
                        {{$celebrity->bio}}
                    </div>
                </li>
            </ul>
            @endforeach
        </div>
{{ $celebrities->links() }}
</x-app-layout>