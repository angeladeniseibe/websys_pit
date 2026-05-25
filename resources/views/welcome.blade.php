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

<body class="bg-black">

<!-- HERO -->
<section class="relative min-h-screen overflow-hidden">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <img src="/images/welcome_bg-photo.jpeg"
             class="w-full h-full object-cover">
    </div>

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- NAVBAR -->
    <nav class="relative z-20 flex justify-between items-center px-10 py-6">

        <h1 class="text-3xl font-bold text-white">
            Dream<span class="text-[#d4af37]">Home</span>
        </h1>

        <div class="space-x-4">

            <a href="{{ route('login') }}"
               class="text-white hover:text-[#d4af37] transition">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="bg-[#d4af37] px-5 py-2 rounded-lg
               text-white hover:bg-[#c49b1e] transition">
                Register
            </a>

        </div>

    </nav>

    <!-- CONTENT -->
    <div class="relative z-10 flex items-center h-[80vh] px-10">

        <div class="max-w-2xl">

            <p class="uppercase tracking-[6px]
            text-[#d4af37] mb-4">
                Modern Real Estate
            </p>

            <h1 class="text-6xl md:text-8xl
            font-bold text-white leading-tight mb-6">
                Find Your
                Dream Home
            </h1>

            <p class="text-gray-300 text-xl mb-10 leading-relaxed">
                Smart property management system for rentals,
                branches, clients, and staff operations.
            </p>

            <a href="{{ route('login') }}"
               class="bg-[#d4af37] hover:bg-[#c49b1e]
               px-8 py-4 rounded-xl text-white
               font-semibold transition">
                Get Started
            </a>

        </div>

    </div>

</section>

</body>