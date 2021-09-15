<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">

            <a href="{{ route('celebrities.create') }}">
                <button> Add </button>
            </a>
        <div class="relative flex grid min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @foreach ($celebrities as $celebrity)
            <ul>
                <li>
                    <a href="{{ route('celebrities.show', $celebrity) }}">
                        {{ $celebrity->name }} :
                    </a>
                    <div>
                        {{$celebrity->bio}}
                    </div>
                </li>
            </ul>
            @endforeach


        </div>
    </body>
</html>