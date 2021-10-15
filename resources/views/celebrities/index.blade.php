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
            <div class="grid grid-cols-4 gap-4">
                @foreach ($celebrities as $celebrity)
                <a href="{{ route('celebrities.show', $celebrity) }}" class="text-center justify-center space-y-3">
                    <div class="mx-auto w-1/2 h-40">
                        <img src="{{ url($celebrity->poster) }}" alt="poster"  class="object-cover h-full w-full">
                    </div>

                    <div class="justify-self-start">
                        {{ $celebrity->name }}
                    </div>
                @endforeach
            </div>

        {{ $celebrities->links() }}
    </div>
</x-app-layout>
