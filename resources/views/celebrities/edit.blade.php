<x-app-layout>
    <x-slot name="header">
        Edit Celebrity
    </x-slot>
        <form action="{{ route('celebrities.update', $celebrity)}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                Name: 
                <input
                    type="text"
                    name="name"
                    id="name"
                    value={{ old('name', $celebrity->name)}}
                >
            </div>

            <div>
                D.O.B: 
                <input
                    type="date"
                    name="dob"
                    id="dob"
                    value={{ old('D=dob', $celebrity->dob)}}
                >

            </div>

            <div>
                Nationality: 
                <input
                    type="text"
                    name="nationality"
                    id="nationality"
                    value={{ old('nationality', $celebrity->nationality)}}
                >
            </div>

            <div>
                Bio: 
                <input
                    type="text"
                    name="bio"
                    id="bio"
                    value={{ old('bio', $celebrity->bio)}}
                >
            </div>

            <div>
                <button type="submit"> Update </button>
            </div>
        </form>
</x-app-layout>