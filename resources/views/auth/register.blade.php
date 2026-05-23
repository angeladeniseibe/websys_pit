<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Dream Home</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="h-screen overflow-hidden">

<section class="h-screen flex items-center justify-center relative">

    <!-- BACKGROUND -->
    <div class="absolute inset-0">
        <img src="/images/welcome_bg-photo.jpeg"
             class="w-full h-full object-cover">
    </div>

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-black/75"></div>

    <!-- CARD -->
    <div class="relative z-10
        bg-white/10 backdrop-blur-xl
        border border-white/20
        rounded-2xl
        shadow-2xl
        p-6
        w-full max-w-sm">

        <!-- TITLE -->
        <div class="text-center mb-6">

            <p class="uppercase tracking-[5px] text-[#d4af37] text-xs mb-2">
                Dream Home
            </p>

            <h1 class="text-3xl font-bold text-white">
                Create Account
            </h1>

        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="space-y-4">

                <!-- FIRST NAME -->
                <input type="text" name="first_name" placeholder="First Name" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white">

                <!-- LAST NAME -->
                <input type="text" name="last_name" placeholder="Last Name" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white">

                <!-- ADDRESS -->
                <input type="text" name="address" placeholder="Address" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white">

                <!-- PHONE -->
                <input type="text" name="phone" placeholder="Phone Number" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white">

                <!-- EMAIL -->
                <input type="email" name="email" placeholder="Email" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white">

                <!-- PASSWORD -->
                <input type="password" name="password" placeholder="Password" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white">

                <!-- PASSWORD CONFIRMATION -->
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                    class="w-full px-4 py-2.5 rounded-xl bg-white/10 border border-white/20 text-white">
            </div>

            <button type="submit"
                class="w-full mt-5 bg-[#d4af37] hover:bg-[#c49b1e]
                text-white py-2.5 rounded-xl font-semibold transition">
                Register
            </button>

        </form>

        <!-- LOGIN -->
        <p class="text-center text-gray-300 mt-5 text-sm">
            Already have an account?
            <a href="{{ route('login') }}" class="text-[#d4af37] font-semibold">Login</a>
        </p>

    </div>

</section>

</body>
</html>