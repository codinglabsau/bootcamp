<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div>
            <x-form :action="route('movies.store')" method="POST" buttonLabel="CREATE">
                @csrf
                <div>
                    <!--Title-->
                    <div>
                        <x-label for="title" value="Title"/>

                        <x-input type="text" name="title" id="title" :value="old('title')"/>
                    </div>

                    <!--Release Date-->
                    <div>
                        <x-label for="release_date" value="Release Date"/>

                        <x-input type="date" name="release_date" id="release_date" :value="old('release_date')"/>
                    </div>

                    <!--Poster-->
                    <div>
                        <x-label for="poster" value="Poster"/>

                        <x-input type="text" name="poster" id="poster" :value="old('poster')"/>
                    </div>

                    <!--Trailer-->
                    <div>
                        <x-label for="trailer" value="Trailer"/>

                        <x-input type="text" name="trailer" id="trailer" :value="old('trailer')"/>
                    </div>

                    <!--Blurb-->
                    <div>
                        <x-label for="blurb" value="Blurb"/>

                        <textarea name="blurb" id="blurb"></textarea>

                    </div>

                </div>
            </x-form>
        </div>
    </x-auth-card>
</x-guest-layout>
