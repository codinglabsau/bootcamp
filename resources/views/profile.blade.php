<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body class="bg-black">

    <header class=" text-white">This is the profile page</header>

    <!-- Main box-->
    <div class="bg-white border-4 border-pink-600 my-24 mx-24 filter drop-shdaow-md">

        <!-- Profile Picture-->
        <div class ="flex justify-center pt-12">
            <!--<img src="Banana-Single.jpeg" class="border-3 border-purple-400 round-full">-->
            <div class= "bg-purple-600 round-full h-12 w-12"> PFP </div>
        </div>


        <!-- Profile information-->
        <div class ="flex justify-around pb-8">

            <div>
                    <!-- Name -->
                <div>
                    Name
                    <div>
                        <input type="text" placeholder="David" size ="50" class= "text-black bg-transparent border-2 border-pink-400 placeholder-black">
                    </div>

                </div>
                <!-- Email -->
                <div>
                    Email
                    <div>
                        <input type="text" placeholder="david@email.com" size ="50" class= "text-black bg-transparent border-2 border-pink-400 placeholder-black">
                    </div>

                </div>
                <!-- Change Password -->
                <div>
                    <button class="bg-pink-400"> Change Password </button>
                </div>

            </div>

            <!-- Save changes-->
            <button class="br-pink-400 self-end"> Save Changes</button>

            <!-- Bio -->
            <div>
                Bio
                <div class="pr-8">
                    <input type="text" placeholder="My name is david. I am a 32 year old man with nothing better to do" size ="50" class= "text-black bg-transparent border-2 border-pink-400 placeholder-black h-64 w-64">
                </div>

            </div>



        </div>


    </div>


</body>
