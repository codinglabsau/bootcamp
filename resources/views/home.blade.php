<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="min-h-screen flex justify-center text-white">
        <div class="flex items-center pt-12">
            <div class="text-8xl font-mono italic lex justify-center ">
                <div>
                    Welcome to Film Labs!
                </div>
                <div class="text-4xl flex justify-center py-12">
                    Search By...
                </div>
                <div >
                    <div class="flex justify-evenly text-xl">
                        <div>
                           <a href="{{ route('movies.index') }}">
                                Movies
                            </a>
                        </div>
                        <div>
                          <a href="{{ route('movies.index') }}">
                                Celebrites
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
