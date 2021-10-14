{{-- THIS IS A PHP FOR SIMPLE TESTING. DELETE THIS ONCE ALL TESTING IS COMPLETED (OR UPON MERGE WITH Finn'S BRANCH) --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __($movie->name) }}
                </h2>
            </div>

            <div class="flex grid grid-cols-2">
                <div>
                    <button> EDIT </button>
                </div>
                <div>
                    <button> DELETE </button>
                </div>
            </div>
        </div>
    </x-slot>

    This is the page for Movie {{$movie->name}}

    @foreach ($movie->celebrities as $celebrity)
        <div>
            <a href="{{ route('celebrity.show', $celebrity) }}" class="flex grid gap-2 grid-cols-2">
                <div class="justify-self-start">
                    {{ $celebrity->name }}
                </div>
            </a>
        </div>
    @endforeach
</x-app-layout>