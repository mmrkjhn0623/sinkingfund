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
        <div class="container max-w-screen-xl 2xl:mx-auto mx-5 flex justify-center items-center">
            <div class="inline-flex gap-2 justify-start items-center">
                <a href="{{ url('/') }}"><img class="w-12 object-cover" src="{{ url('/public/storage/assetimg/sflogo.png') }}" alt="Member Image"></a>
                <h1 class="site-logo text-2xl font-bold"><a href="{{ url('/') }}">Piggycash</a></h1>
            </div>
        </div>
    </header>
    <main class="termscondition flex items-center justify-center">
        <div class="w-full max-w-4xl p-4 my-12">
            <h1 class="text-4xl text-center font-bold uppercase mb-8">Privacy Policy</h1>
            <h2 class="text-3xl font-medium mt-6 mb-4">Who we are</h2>
            <p class="mb-6">Our website address is: TBA</p>

            <h2 class="text-3xl font-medium mt-6 mb-4">Media</h2>
            <p class="mb-4 text-gray-300">If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p>

            <h2 class="text-3xl font-medium mt-6 mb-4">Cookies</h2>
            <p class="mb-4 text-gray-300">If you leave a comment on our site you may opt in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p>

            <p class="mb-4 text-gray-300">If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>

            <p class="mb-4 text-gray-300">When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select “Remember Me”, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>

            <p class="mb-4 text-gray-300">If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>

            <h2 class="text-3xl font-medium mt-6 mb-4">Embedded content from other websites</h2>
            <p class="mb-4 text-gray-300">Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p>

            <p class="mb-4 text-gray-300">These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p>

            <h2 class="text-3xl font-medium mt-6 mb-4">Mobile data</h2>
            <p class="mb-4 text-gray-300">No mobile information will be shared with third parties/affiliates for marketing/promotional purposes. All other categories exclude text messaging originator opt-in data and consent; this information will not be shared with any third parties.</p>

            <p class="mb-4 text-gray-300">By providing a telephone number and submitting the form you are consenting to be contacted by SMS text message. Message & data rates may apply. Reply STOP to opt out of further messaging.</p>

            <h2 class="text-3xl font-medium mt-6 mb-4">How long we retain your data</h2>
            <p class="mb-4 text-gray-300">If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>

            <p class="mb-4 text-gray-300">For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>

            <h2 class="text-3xl font-medium mt-6 mb-4">What rights you have over your data</h2>
            <p class="mb-4 text-gray-300">If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>

            <h2 class="text-3xl font-medium mt-6 mb-4">Where your data is sent</h2>
            <p class="mb-4 text-gray-300">Visitor comments may be checked through an automated spam detection service.</p>
        </div>
    </main>
    <footer class="mt-8 2xl:px-0 px-5">
        <div class="max-w-screen-xl mx-auto py-8 flex flex-row flex-wrap gap-4 sm:justify-between justify-center items-center border-t border-gray-800">
            <h3 class="font-bold text-gray-400">Piggycash</h3>
            <div class="flex flex-wrap flex-row sm:justify-end justify-center gap-5 sm:w-auto w-full gap-4 text-gray-500">
                <a href="{{ url('/termsandconditions') }}" class="hover:text-gray-300">Terms & Conditions</a>
                <p class="text-base sm:inline hidden">|</p>
                <a href="{{ url('/privacypolicy') }}" class="hover:text-gray-300">Privacy Policy</a>
                <p class="text-base sm:inline hidden">|</p>
                <p class="text-base">All Right Reserved {{ date("Y") }}.</p>
            </div>
        </div>
    </footer>
</body>
</html>