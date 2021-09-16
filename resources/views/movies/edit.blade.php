
<html>

    <body class="antialiased">
        <form action="{{ route('movies.update', $movie)}}" method="POST">
            @method('PUT')
            @csrf
            <!--Title-->
            <x-input type="text" name="title" id="title" :value="old('title', $movie->title)"/>
            <div>
            <!--Date-->
            <x-input type="date" name="release_date" id="release_date" :value="old('release_date', $movie->release_date)"/> :title
            <div>
            <!--Poster-->
            <x-input type="text" name="poster" id="poster" :value="old('poster', $movie->poster)"/>
            <div>
            <!--Trailer-->
            <x-input type="text" name="trailer" id="trailer" :value="old('trailer', $movie->trailer)"/>
            <div>
            <!--Blurb-->
            <x-input type="text" name="blurb" id="blurb" :value="old('blurb', $movie->blurb)"/>
            <div>
                <button type="submit"> Update </button>
            </div>
        </form>
    </body>
</html>




