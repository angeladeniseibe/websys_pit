<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dream Home</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="dashboard-body">

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar flex flex-col">

        <h1 class="logo">Dream Home</h1>

        <!-- NAVIGATION -->
        <nav class="flex flex-col gap-2 mt-6">
            
            <a href="{{ route('inspections.index') }}">Inspections</a>
            <a href="{{ route('leases.index') }}">Lease Management</a>

        </nav>

        <!-- LOGOUT -->
        <div class="mt-auto pt-10">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-full px-4 py-3 bg-gray-800 text-white rounded-xl hover:bg-gray-700 transition">
                    Logout
                </button>
            </form>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        @yield('content')
    </main>

</div>

</body>
</html>