<x-app-layout>
    <x-slot name="header">
        Edit Celebrity
    </x-slot>
        <form action="{{ route('celebrities.update', $celebrity)}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <x-label for="name" value="Name"/>

                <x-input type="name" name="name" id="tname" :value="old('name', $celebrity->name)"/>
            </div>

            <div>
                <x-label for="dob" value="Dob"/>

                <x-input type="dob" name="dob" id="dob" :value="old('dob', $celebrity->dob)"/>
            </div>
            
            <div>
                <x-label for="nationality" value="Nationality"/>

                <x-input type="nationality" name="nationality" id="nationality" :value="old('nationality', $celebrity->nationality)"/>
            </div>
            
            <div>
                <x-label for="bio" value="Bio"/>

                <textarea type="bio" name="bio"  rows="5" cols="25" id="bio" :value="old('bio', $celebrity->bio)"></textarea>
            </div>
            
            <div>
                <button type="submit"> Submit </button>
            </div>
        </form>
</x-app-layout>