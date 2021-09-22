<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div>
            <x-form :action="route('movies.update', $movie)" method="POST" buttonLabel="UDPATE">
                @method('PUT')
                @csrf
                <div>
                    <!--Title-->
                    <div>
                        <x-label for="title" value="Title"/>

                        <x-input type="text" name="title" id="title" :value="old('title', $movie->title)"/>
                    </div>

                    <!--Release Date-->
                    <div>
                        <x-label for="release_date" value="Release Date"/>

                        <x-input type="date" name="release_date" id="release_date" :value="old('release_date', $movie->release_date->format('Y-m-d'))"/>
                    </div>

                    <!--Poster-->
                    <div>
                        <x-label for="poster" value="Poster"/>

                        <x-input type="text" name="poster" id="poster" :value="old('poster', $movie->poster)"/>
                    </div>

                    <!--Trailer-->
                    <div>
                        <x-label for="trailer" value="Trailer"/>

                        <x-input type="text" name="trailer" id="trailer" :value="old('trailer', $movie->trailer)"/>
                    </div>

                    <!--Blurb-->
                    <div>
                        <x-label for="blurb" value="Blurb"/>

                        <textarea name="blurb" id="blurb"> {{$movie->blurb}}</textarea>

                    </div>

                </div>
            </x-form>
        </div>
    </x-auth-card>
</x-guest-layout>





