<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Add a new celebrity') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1">
        <div class="w-1/2 justify-self-center">
            <x-form :action="route('celebrities.store')" method="POST" buttonLabel="CREATE">
                @csrf
                <div class="flex grid grid-cols-1 gap-y-6 gap-x-2 place-content-between text-white border-pink-500 border-2 border-opacity-50 bg-purple-800 bg-opacity-25 px-4 py-6 md:grid-cols-2">
                    <!-- cell 1-->
                    <div class="grid grid-flow-row gap-y-2 justify-self-center">
                        <!--Title-->
                        <div>
                            <x-label for="name" value="Name"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="string"
                            name="name"
                            id="name"
                            :value="old('name')"/>

                        </div>
                        <!--DOB-->
                        <div>
                            <x-label for="dob" value="D.O.B"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="date"
                            name="dob"
                            id="dob"
                            :value="old('dob')"/>
                        </div>
                        <!--Nationality-->
                        <div>
                            <x-label for="nationality" value="Nationality"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="string"
                            name="nationality"
                            id="nationality"
                            :value="old('nationality')"/>
                        </div>
                        <!--Bio-->
                        <div>
                            <x-label for="bio" value="Bio"/>

                            <textarea class="border-pink-500 border bg-purple-800 bg-opacity-25" id="bio" name="Bio" rows="5" cols="25"></textarea>
                        </div>
                    </div>

                    <!--cell 2-->
                    <div class="justify-self-center grid grid-cols-1">
                        <!--Poster-->
                        <div>
                            <x-label for="poster" value="Poster"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="string"
                            name="poster"
                            id="poster"
                            :value="old('poster')"/>
                        </div>
                    </div>

                    <!--cell 3-->
                    <div class="justify-self-center">
                        <!--Movies-->
                        <x-label for="movies" value="Movies"/>
                        <div class="border-pink-500 border bg-purple-800 bg-opacity-25 pl-8 h-32 w-full overflow-auto">
                            @foreach ($movies as $movie)
                                <label class="grid grid-flow-col items-center">
                                    <input
                                    type="checkbox"
                                    class="border-pink-500 border bg-purple-800 bg-opacity-25"
                                    name="movies[]"
                                    value="{{$movie->id}}">
                                    <span>{{$movie->title}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</x-app-layout>