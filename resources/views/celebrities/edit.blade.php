<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit celebrity')  }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1">
        <div class="w-1/2 justify-self-center">
            <x-form :action="route('celebrities.update', $celebrity)" method="POST" buttonLabel="UPDATE">
                @method('PUT')
                @csrf
                <div class="flex grid grid-cols-1 gap-y-6 gap-x-2 place-content-between text-white border-pink-500 border-2 border-opacity-50 bg-purple-800 bg-opacity-25 px-4 py-6 md:grid-cols-2">
                    <!-- cell 1-->
                    <div class="grid grid-flow-row gap-y-2 justify-self-center">
                        <!--Name-->
                        <div>
                            <x-label for="name" value="Name"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="string"
                            name="name"
                            id="name"
                            :value="old('name', $celebrity->name)"/>
                        </div>
                        <!--D.O.B-->
                        <div>
                            <x-label for="dob" value="D.O.B"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="date"
                            name="dob"
                            id="dob"
                            :value="old('dob', $celebrity->dob)"/>
                        </div>
                        <!--Nationality-->
                        <div>
                            <x-label for="nationality" value="Nationality"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="string"
                            name="nationality"
                            id="nationality"
                            :value="old('nationality', $celebrity->nationality)"/>
                        </div>
                        <!--bio-->
                        <div>
                            <x-label for="bio" value="Bio"/>

                            <textarea class="border-pink-500 border bg-purple-800 bg-opacity-25" type="bio" name="bio"  rows="5" cols="5" id="bio" >
                                {{ old('bio', $celebrity->bio) }}
                            </textarea>
                        </div>
                    </div>

                    <!--cell 2-->
                    <div class="justify-self-center grid grid-cols-1">
                        <!--Poster-->
                        <div>
                            <x-label for="poster" value="Poster"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="text"
                            name="poster"
                            id="poster"
                            :value="old('poster', $celebrity->poster)"/>
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</x-app-layout>