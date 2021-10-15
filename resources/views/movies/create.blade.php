<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Create a Movie') }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1 bg-black bg-opacity-10 pt-8">
        <div class="w-1/2 justify-self-center">
            <x-form :action="route('movies.store')" method="POST" buttonLabel="CREATE">
                @csrf
                <div class="flex grid grid-cols-1 gap-y-6 gap-x-2 place-content-between text-white bg-blue-900 bg-opacity-20 px-4 py-6 rounded-md md:grid-cols-2">
                    <!-- cell 1-->
                    <div class="grid grid-flow-row gap-y-2 justify-self-center">
                        <!--Title-->
                        <div>
                            <x-label for="title" value="Title"/>

                            <x-input class="border-purple-500 border-opacity-70 bg-purple-800 bg-opacity-25 focus-within:bg-opacity-5"
                            type="text"
                            name="title"
                            id="title"
                            :value="old('title')"/>

                        </div>
                        <!--Release Date-->
                        <div>
                            <x-label for="release_date" value="Release Date"/>

                            <x-input class="border-purple-500 border-opacity-70 bg-purple-800 bg-opacity-25 focus-within:bg-opacity-5"
                            type="date"
                            name="release_date"
                            id="release_date"
                            :value="old('release_date')"/>
                        </div>
                        <!--Poster-->
                        <div>
                            <x-label for="poster" value="Poster"/>

                            <x-input class="border-purple-500 border-opacity-70 bg-purple-800 bg-opacity-25 focus-within:bg-opacity-5"
                            type="text"
                            name="poster"
                            id="poster"
                            :value="old('poster')"/>
                        </div>
                        <!--Trailer-->
                        <div>
                            <x-label for="trailer" value="Trailer"/>

                            <x-input class="border-purple-500 border-opacity-70 bg-purple-800 bg-opacity-25 focus-within:bg-opacity-5"
                            type="text"
                            name="trailer"
                            id="trailer"
                            :value="old('trailer')"/>
                        </div>
                    </div>

                    <!--cell 2-->
                    <div class="justify-self-center">
                        <!--Blurb-->
                        <div>
                            <x-label for="blurb" value="Blurb"/>

                            <textarea class="flex h-60 leading-normal border-purple-500 border-opacity-70 bg-purple-800 bg-opacity-25 focus-within:bg-opacity-5"
                            name="blurb"
                            id="blurb"></textarea>
                        </div>
                    </div>

                    <!--cell 3-->
                    <div class="justify-self-center">
                        <!--Celebrities-->
                        <x-label for="celebrities" value="Celebrities"/>
                        <div class="bg-black bg-opacity-25 pt-4 px-8 h-60 w-64 overflow-auto shadow-lg">
                            @foreach ($celebrities as $celebrity)
                                <label class="flex items-center space-x-2">
                                    <input
                                    type="checkbox"
                                    class="border-purple-500 border-opacity-70"
                                    name="celebrities[]"
                                    value="{{$celebrity->id}}">
                                    <span >{{$celebrity->name}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!--cell 4-->
                    <div class="justify-self-center">
                        <!--Genre-->
                        <x-label for="genres" value="Genres"/>
                        <div class="bg-black bg-opacity-25 pt-4 px-8 h-60 w-64 overflow-auto shadow-lg">
                            @foreach ($genres as $genre)
                                <label class="flex items-center space-x-2">
                                    <input
                                    type="checkbox"
                                    class="border-purple-500 border-opacity-70"
                                    name="genres[]"
                                    value="{{$genre->id}}">
                                    <span>{{$genre->type}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                @error('title')
                    <p>{{$message}}</p>
                @enderror
                @error('poster')
                    <p>{{$message}}</p>
                @enderror
                @error('trailer')
                    <p>{{$message}}</p>
                @enderror
                @error('blurb')
                    <p>{{$message}}</p>
                @enderror
            </x-form>
        </div>
    </div>
</x-app-layout>
