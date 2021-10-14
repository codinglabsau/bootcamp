<x-app-layout>
<x-slot name="header">
    <div class="flex justify-between">
        <div>
            <h2 class="justify-center text-6xl font-black">
                {{ __($celebrity->name) }}
            </h2>
        </div>
        <div>
            <div class="flex space-x-2">
                <a href="{{ route('celebrities.edit', $celebrity) }}">
                    <button class="flex items-center bg-pink-300 text-black rounded-xl p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>    
                        EDIT 
                    </button>
                </a>
                <form method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="flex items-center bg-pink-300 text-black rounded-xl p-2"> 
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg> 
                        DELETE 
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-slot>
<div class="grid grid-flow-row px-16 py-8">
    <div class="flex justity-end">
        <div class="px-2 w-1/2 transform scale-100">
            <img src="{{ url($celebrity->poster) }}" alt="poster">
        </div>
        <div class="flex justity-start w-1/2">
            <div class="italic text-3xl space-y-4">
                <div class="break-all">
                Bio: {{$celebrity->bio}}
                </div>
                <div class="break-all">
                D.O.B: {{$celebrity->dob}}
                </div>
                <div class="break-all">
                Nationality: {{$celebrity->nationality}}
                </div>
            </div>
        </div>
    </div>
    <div class="text-3xl italic mt-10">
        Known for: 
        <div class="flex space-x-2 mt-5">
        @foreach ($celebrity->movies as $movie)
		    <img class= "object-cover w-1/6" src="{{ url($movie->poster) }}" alt="poster">
        @endforeach
        </div>
    </div> 
</div>

</x-app-layout>