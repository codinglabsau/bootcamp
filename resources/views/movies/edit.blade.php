<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Edit movie')  }}
        </h2>
    </x-slot>
    <div class="grid grid-cols-1">
        <div class="w-1/2 justify-self-center">
            <x-form :action="route('movies.update', $movie)" method="POST" buttonLabel="UPDATE">
                @method('PUT')
                @csrf
                <div class="flex grid grid-cols-1 gap-y-6 gap-x-2 place-content-between text-white border-pink-500 border-2 border-opacity-50 bg-purple-800 bg-opacity-25 px-4 py-6 md:grid-cols-2">
                    <!-- cell 1-->
                    <div class="grid grid-flow-row gap-y-2 justify-self-center">
                        <!--Title-->
                        <div>
                            <x-label for="title" value="Title"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="text"
                            name="title"
                            id="title"
                            :value="old('title', $movie->title)"/>

                        </div>
                        <!--Release Date-->
                        <div>
                            <x-label for="release_date" value="Release Date"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="date"
                            name="release_date"
                            id="release_date"
                            :value="old('release_date', $movie->release_date->format('Y-m-d'))"/>
                        </div>
                        <!--Poster-->
                        <div>
                            <x-label for="poster" value="Poster"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="text"
                            name="poster"
                            id="poster"
                            :value="old('poster', $movie->poster)"/>
                        </div>
                        <!--Trailer-->
                        <div>
                            <x-label for="trailer" value="Trailer"/>

                            <x-input class="border-pink-500 border bg-purple-800 bg-opacity-25"
                            type="text"
                            name="trailer"
                            id="trailer"
                            :value="old('trailer', $movie->trailer)"/>
                        </div>
                    </div>

                    <!--cell 2-->
                    <div class="justify-self-center grid grid-cols-1">
                        <!--Blurb-->
                        <div class="self-end">
                            <x-label for="blurb" value="Blurb"/>

                            <textarea class="leading-normal border-pink-500 border bg-purple-800 bg-opacity-25"
                            name="blurb"
                            id="blurb"> {{$movie->blurb}}</textarea>
                        </div>
                    </div>

                    <!--cell 3-->
                    <div class="justify-self-center">
                        <!--Celebrities-->
                        <x-label for="celebrity" value="Celebrities"/>

                        <textarea class="leading-normal border-pink-500 border bg-purple-800 bg-opacity-25"
                        name="celebrities"
                        id="celebrities"> Existing Celebrities</textarea>
                    </div>

                    <!--cell 4-->
                    <div class="justify-self-center">
                        <!--Genre-->
                        <x-label for="genre" value="Genres"/>

                        <textarea class="leading-normal border-pink-500 border bg-purple-800 bg-opacity-25"
                        name="genres"
                        id="genres"> Existing Genres</textarea>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
</x-app-layout>





