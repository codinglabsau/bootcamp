<x-app-layout>
    <x-slot name="header">
        {{$celebrity->name}}
    </x-slot>
        <div class="flex grid">
            <div>
                Name: {{$celebrity->name}}
            </div>

            <div>
                <div>
                    D.O.B: {{$celebrity->dob}}
                </div>
                <div>
                    Nationality: {{$celebrity->nationality}}
                </div>
            </div>

            <div>
                <div>
                    Bio: {{$celebrity->bio}}
                </div>
            </div>
            <div>
                <a href="{{ route('celebrities.edit', $celebrity) }}">
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