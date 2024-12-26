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
    <main class="flex items-center justify-center sm:my-52 my-28">
        <div class="card w-full max-w-sm p-4 rounded-lg p-4 sticky top-28">
            <a href="http://localhost/piggycash" class="flex justify-center mt-2 mb-2" >
                <img class="w-12 object-cover" src="{{ url('/public/storage/assetimg/sflogo.png') }}" alt="Member Image">
            </a>
            <h3 class="text-2xl mb-1 font-bold leading-none text-gray-900 dark:text-white mb-6 text-center">
            Sign in to Piggycash
            </h3>
            <form class="w-full" action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @error('email')
                    <div id="errormessage" class="appearance-none block w-full rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500 dark:text-red-600 text-center">{{ $message }}</div>
                @enderror
                <div class="flex flex-col -mx-3 mb-6">
                    <div class="px-3">
                        <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                            Email
                        </label>
                        <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500" id="email" name="email" type="email" placeholder="Enter Email" value="{{ old('email') }}" onclick="document.getElementById('errormessage').classList.add('hidden')" />
                        
                    </div>
                    <div class="px-3">
                        <label class="block uppercase tracking-wide text-gray-400 font-bold mb-2" for="grid-password">
                            Password
                        </label>
                        <input class="appearance-none block w-full bg-gray-700 text-gray-200 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-gray-500"  id="password" name="password" type="password" placeholder="Enter Password" value="{{ old('password') }}" onclick="document.getElementById('errormessage').classList.add('hidden')" />
                    </div>
                    <div class="px-3">
                        <button id="loginsubmit" type="submit" class="text-white bg-blue-700 w-full mt-4 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg cursor-pointer px-8 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Sign in
                        </button>
                    </div>
                </div>
            </form>    
        </div>
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