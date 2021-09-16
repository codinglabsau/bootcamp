<x-app-layout>
    <x-slot name="header">
        Create Celebrity  
    </x-slot>
        <form action="{{ route('celebrities.store')}}" method="POST">
            @csrf
            This is to create a new celebrity entry point
            <div>
                Name: 
                <input
                    type="text"
                    name="name"
                    id="name"
                    value= "{{ old('name') }}"
                >
            </div>
            <div>
                D.O.B: 
                <input
                    type="date"
                    name="dob"
                    id="dob"
                    value="{{ old('dob') }}"
                >
            </div>
            <div>
                Nationality: 
                <input
                    type="text"
                    name="nationality"
                    id="nationality"
                    value= "{{ old('nationality') }}"
                >
            </div>
            <div>
                Bio: 
                <input
                    type="text"
                    name="bio"
                    id="bio"
                    value= "{{ old('bio') }}"
                >
            </div>

            <div>
                <button type="submit"> Submit </button>
            </div>
        </form>
</x-app-layout>