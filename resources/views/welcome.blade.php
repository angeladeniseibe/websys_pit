<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Home</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

<!-- HERO SECTION -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <div class="absolute inset-0">
        <img src="/images/welcome_bg-photo.jpeg"
             class="w-full h-full object-cover">
    </div>

    <!-- DARK OVERLAY -->
    <div class="absolute inset-0 bg-black/55"></div>

    <!-- CONTENT -->
    <div class="relative z-10 text-center px-6 max-w-3xl">

        <!-- LOGO / TITLE -->
        <h1 class="text-6xl md:text-7xl font-bold text-white mb-6">
            Dream Home
        </h1>

        <!-- SUBTITLE -->
        <p class="text-lg md:text-2xl text-gray-200 mb-10 leading-relaxed">
            Your modern real estate management system for properties,
            branches, staff, and clients.
        </p>

        <!-- BUTTONS -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">

            <a href="{{ route('login') }}"
               class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 text-white rounded-xl text-15 font-medium transition duration-300">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 text-white rounded-xl text-15 font-medium transition duration-300">
                Register
            </a>

        </div>

    </div>

</section>

</body>
</html>