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
    <aside class="sidebar">

        <h1 class="logo">Dream Home</h1>

        <nav>
            <a href="/dashboard"   class="{{ request()->is('dashboard')   ? 'active' : '' }}">Dashboard</a>
            <a href="/properties"  class="{{ request()->is('properties*') ? 'active' : '' }}">Properties</a>
            <a href="/clients"     class="{{ request()->is('clients*')    ? 'active' : '' }}">Clients</a>
            <a href="/branches"    class="{{ request()->is('branches*')   ? 'active' : '' }}">Branches</a>
            <a href="/staff"       class="{{ request()->is('staff*')      ? 'active' : '' }}">Staff</a>
            <a href="/reports"     class="{{ request()->is('reports*')    ? 'active' : '' }}">Reports</a>
        </nav>

        <!-- LOGOUT BUTTON -->
        <div class="mt-auto pt-10">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-full px-4 py-3 bg-rgba(17,24,39,0.65) rgba(255,255,255,0.1) text-white rounded-xl transition">
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