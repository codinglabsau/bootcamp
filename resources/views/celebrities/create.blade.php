<x-app-layout>
    <x-slot name="header">
        Create Celebrity  
    </x-slot>
        <form action="{{ route('celebrities.store')}}" method="POST">
            @csrf
            This is to create a new celebrity entry point
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-60" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            
            <div>
                <x-label for="dob" :value="__('D.O.B')" />

                <x-input id="dob" class="block mt-1 w-60" type="date" name="dob" :value="old('dob')" required autofocus />
            </div>
            <div>
                <x-label for="nationality" :value="__('Nationality')" />

                <x-input id="nationality" class="block mt-1 w-60" type="text" name="nationality" :value="old('nationality')" required autofocus />
            </div>
            <div>
                <x-label for="bio" :value="__('Bio')" />

                <textarea id="bio" class="block mt-1 w-60" type="text" name="bio" :value="old('bio')" required autofocus />
            </div>

            <div>
                <button type="submit"> Submit </button>
            </div>
        </form>
</x-app-layout>