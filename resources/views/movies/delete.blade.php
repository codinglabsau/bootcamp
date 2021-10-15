
{{-- Source of Modal design https://www.mywebtuts.com/blog/alpine-js-tailwind-modal-example --}}
<body>

    {{-- Need to convert this section of code into proper component --}}
    <!-- modal div -->
    <div class="mt-6" x-data="{ open: false }">
        <!-- Button (blue), duh! -->
        <button class="px-4 py-2 rounded select-none outline-black focus:shadow-outline" @click="open = true">DELETE</button>
        <!-- Dialog (full screen) -->
        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open"  >
            <!-- A basic modal: Warning message with Cancel or Confirm button -->
            <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
                <!-- dialog box -->
                <div class="mt-2">
                    <p class="text-sm leading-5 text-gray-500">
                        Do you wish to delete the following entity?
                    </p>
                </div>
                <!-- Confirmation button -->
                <div class="mt-5 sm:mt-6">
                    <span class="flex w-full rounded-md shadow-sm">

                        {{-- {{$slot}} Delete From will be inserted here--}}

                        <button class="inline-flex justify-center w-full px-4 py-2 text-white bg-purple-500 rounded hover:bg-purple-700">
                            CONFIRM
                        </button>
                    </span>
                </div>
                <!-- Cancel button --->
                <div class="mt-5 sm:mt-6">
                    <span class="flex w-full rounded-md shadow-sm">
                        <button @click="open = false" class="inline-flex justify-center w-full px-4 py-2 text-white bg-red-500 rounded hover:bg-red-700">
                            CANCEL
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</body>
