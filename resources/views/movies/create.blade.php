<html>
    <body class="antialiased">
        <form action="{{ route('movies.store')}}" method="POST">
            @csrf
            <!--Title-->
            <div>


                <x-input type="text" name="title" id="title" :value="old('title')"/>
            </div>

            <div>
                <!--Release Date-->
                <x-input type="date" name="release_date" id="release_date" :value="old('release_date')"/>
            </div>
            <div>
                <!--Poster URL-->
                <x-input type="text" name="poster" id="poster" :value="old('poster')"/>
            </div>
            <div>
                <!--Trailer URL-->
                <x-input type="text" name="trailer" id="trailer" :value="old('trailer')"/>
            </div>
            <div>
                <!--blurb URL-->
                <x-input type="text" name="blurb" id="blurb" :value="old('blurb')"/>
            </div>

            <div>
                <button type="submit"> Submit </button>
            </div>
        </form>
    </body>
</html>




