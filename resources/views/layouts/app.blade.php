<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piggycash</title>
    <link rel="icon" type="image/x-icon" href="{{ url('/public/storage/assetimg/sflogo.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    <link rel="stylesheet" href="{{ url('/public/css/style.css') }}">
    <script src="{{ url('/public/js/global.js') }}"></script>
</head>
<body>
    <header class="sticky flex justify-center top-0 z-10 border-b border-gray-700">
        <div class="container max-w-screen-xl 2xl:mx-auto mx-5 flex justify-between items-center">
            <div class="inline-flex gap-2 justify-start items-center">
                <a href="{{ url('/') }}"><img class="w-12 object-cover" src="{{ url('/public/storage/assetimg/sflogo.png') }}" alt="Member Image"></a>
                <h1 class="site-logo text-2xl font-bold"><a href="{{ url('/') }}">Piggycash</a></h1>
            </div>
            <div class="relative">
                <button type="button" id="dropdownUserbtn" class="inline-flex items-center gap-2 font-medium justify-center px-1 py-1 text-base text-gray-900 dark:text-white rounded-full cursor-pointer dark:hover:text-white">
                    @if(isset($user->image) && $user->image !== '')
                        <img class="w-10 h-10 object-cover rounded-full shadow-lg" src="{{ asset($user->image) }}" alt="Member Image">
                    @else
                        <img class="w-10 h-10 object-cover rounded-full shadow-lg" src="{{ asset('public/storage/profileimg/profile_ph.jpg') }}" alt="Default Image"> 
                    @endif
                </button>
                <div id="dropdownUser" class="absolute z-10 hidden right-0 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-300">
                        <li>
                            <a href="{{ url('/changepassword') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Change Password</a>
                        </li>
                    </ul>
                    <div class="py-1">
                    <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main class="min-h-fit 2xl:px-0 px-5">
            @yield('content')
    </main>
    <footer class="mt-8 2xl:px-0 px-5">
        <div class="max-w-screen-xl mx-auto py-8 flex flex-row flex-wrap gap-4 sm:justify-between justify-center items-center border-t border-gray-800">
            <h3 class="font-bold text-gray-400">Piggycash</h3>
            <div class="flex flex-wrap flex-row sm:justify-end justify-center gap-5 sm:w-auto w-full gap-4 text-gray-500">
                <a href="#" class="hover:text-gray-300">Terms & Conditions</a>
                <p class="text-base sm:inline hidden">|</p>
                <a href="#" class="hover:text-gray-300">Privacy Policy</a>
                <p class="text-base sm:inline hidden">|</p>
                <p class="text-base">All Right Reserved {{ date("Y") }}.</p>
            </div>
        </div>
    </footer>
</body>
</html>