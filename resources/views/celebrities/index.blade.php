<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl leading-tight">
                    {{ __('Celebrities') }}
                </h2>
            </div>

            @auth
                <div>
                    <a href="{{ route('celebrities.create') }}">
                        <button> Add</button>
                    </a>
                </div>
            @endauth

        </div>
    </x-slot>

    <div class="pl-8 pt-2 pb-2">
        @foreach ($celebrities as $celebrity)
            <div class="flex grid grid-cols-2">
                <a href="{{ route('celebrities.show', $celebrity) }}" class="flex grid gap-2 grid-cols-2">
                    <div class="w-12 h-24">
                        <img src="{{ url($celebrity->poster) }}" alt="poster">
                    </div>

                    <div class="justify-self-start">
                        {{ $celebrity->name }}
                    </div>
                </a>
                <div>
                    ( {{$celebrity->dob}} )
                </div>

            </div>

        @endforeach
        {{$celebrities->links()}}
    </div>
</x-app-layout>