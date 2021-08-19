<!DOCTYPE html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class ="bg-black">

    <div>
        <!-- Naviagation bar header: create into template view later -->
        <nav class ="section-nav border-purple-600 border-2">

            <div class="bg-black mx-auto px-12 py-6 flex justify-between space-x-4">
                <div class="px-4 py-6 flex justify-between">
                    <!-- Home button (logo) -->
                    <div class= "text-pink-400">
                        <button> HOME </button>
                    </div>

                    <!-- search bar -->
                    <div class="px-4">
                        <input type="text" placeholder="Search..." size ="50" class= "text-pink-400 bg-transparent border-2 border-pink-400 placeholder-pink-400">
                    </div>
                </div>

                <div class="px-4 py-6 flex justify-between">
                    <!-- profile picture-->
                    <div>
                        PROFILE
                    </div>

                    <!-- Log in -->
                    <div>
                        <button class= "text-white border-2 border-pink-400"> Log In </button>
                    </div>
                </div>

            </div>

        </nav>

        <!-- uniquie home page classes-->
        <div class="flex">
            <div>
                <!-- Highlight reel-->
                <img src="images/HP_Trio.jpeg" height="500" width="600">
            </div>

        </div>


        <footer>
            <!--The entire footer class and it's contents to be modified by Tailwind-->
            <div>
                <!-- Class for all items within the footer itself-->
                <div>
                    <!-- Class for all hyper link items (Media links, extended website links-->
                    <div>
                        <!-- Social Media links: Facebook,, youtube etc-->
                        <div class= "text-pink-400">
                            Hyperlink
                        </div>
                        <!-- Website details: About, Contact Us etc-->
                        <div class= "text-pink-400">
                            Website Extentions
                        </div>
                    </div>
                </div>
                <div> Logo </div>
                <p class= "text-pink-400"> Copyright by CodingLabs.com</p>

            </div>

        </footer>


    </div>


</body>
