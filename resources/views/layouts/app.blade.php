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
</html><!DOCTYPE html>
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

        <nav>

            @php
                $isClient = \App\Models\Client::where('user_id', auth()->id())->exists();
            @endphp

            @auth

                {{-- COMMON FOR ALL --}}
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="/properties" class="{{ request()->is('properties*') ? 'active' : '' }}">
                    Properties
                </a>

                {{-- CLIENT ONLY ACCESS --}}
                @if($isClient)

                    <a href="{{ route('clients.my-profile') }}"
                       class="{{ request()->is('my-profile') ? 'active' : '' }}">
                        My Profile
                    </a>

                @endif

                {{-- EMPLOYEES ONLY (ALL NON-CLIENTS) --}}
                @if(!$isClient)

                    <a href="/registrations"
                       class="{{ request()->is('registrations*') ? 'active' : '' }}">
                        Client Registration & Staff Assign
                    </a>

                    <a href="/clients">Clients</a>

                    <!-- STAFF & BRANCH DROPDOWN -->
                    <div>
                        <button onclick="toggleMgmt()" id="mgmt-toggle"
                            style="display:flex;align-items:center;justify-content:space-between;width:100%;background:transparent;color:#cbd5e1;border:none;padding:11px 16px;font-size:15px;border-radius:10px;cursor:pointer;">
                            <span>Staff &amp; Branch Management</span>
                            <span id="mgmt-arrow" style="font-size:11px;transition:transform 0.2s;">&#9660;</span>
                        </button>

                        <div id="mgmt-menu"
                            style="overflow:hidden;max-height:{{ request()->is('branches*','staff*','next-of-kin*') ? '200px' : '0px' }};transition:max-height 0.25s ease;">

                            <a href="/branches"
                                style="display:block;color:#94a3b8;text-decoration:none;padding:9px 16px 9px 32px;font-size:14px;">
                                &#127970; Branch
                            </a>

                            <a href="/staff"
                                style="display:block;color:#94a3b8;text-decoration:none;padding:9px 16px 9px 32px;font-size:14px;">
                                &#128100; Staff
                            </a>

                            <a href="/next-of-kin"
                                style="display:block;color:#94a3b8;text-decoration:none;padding:9px 16px 9px 32px;font-size:14px;">
                                &#128101; Next of Kin
                            </a>
                        </div>
                    </div>

                    <a href="/reports" class="{{ request()->is('reports*') ? 'active' : '' }}">
                        Reports
                    </a>

                    <div>
                        <button onclick="toggleRoles()" id="roles-toggle"
                            style="display:flex;align-items:center;justify-content:space-between;width:100%;background:transparent;color:#cbd5e1;border:none;padding:11px 16px;font-size:15px;border-radius:10px;cursor:pointer;">
                            <span>Roles Subtypes</span>
                            <span id="roles-arrow" style="font-size:11px;transition:transform 0.2s;">&#9660;</span>
                        </button>

                        <div id="roles-menu"
                            style="overflow:hidden;max-height:{{ request()->is('managers*','supervisors*','secretaries*') ? '200px' : '0px' }};transition:max-height 0.25s ease;">

                            <a href="/managers"
                                style="display:block;color:#94a3b8;text-decoration:none;padding:9px 16px 9px 32px;font-size:14px;">
                                &#128084; Managers
                            </a>

                            <a href="/supervisors"
                                style="display:block;color:#94a3b8;text-decoration:none;padding:9px 16px 9px 32px;font-size:14px;">
                                &#128203; Supervisors
                            </a>

                            <a href="/secretaries"
                                style="display:block;color:#94a3b8;text-decoration:none;padding:9px 16px 9px 32px;font-size:14px;">
                                &#128222; Secretaries
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('inspections.index') }}">Inspections</a>
                    <a href="{{ route('leases.index') }}">Lease Management</a>

                @endif

            @endauth

        <!-- NAVIGATION -->
        <nav class="flex flex-col gap-2 mt-6">

            <a href="{{ route('inspections.index') }}">Inspections</a>
            <a href="{{ route('leases.index') }}">Lease Management</a>

            <a href="/dashboard">Dashboard</a>
            <a href="/properties">Properties</a>
            <a href="/registrations">Client Registration & Staff Assign</a>
            <a href="/clients">Clients</a>
            <a href="/reports">Reports</a>
            <a href="/leases">Leases</a>
            <a href="/inspections">Inspection</a>
            
        </nav>

        <!-- LOGOUT -->
        <div class="mt-auto pt-10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    style="width:100%;padding:11px 16px;background:transparent;border:none;color:#cbd5e1;font-size:15px;border-radius:10px;cursor:pointer;text-align:left;">
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

<script>
    @if(request()->is('branches*', 'staff*', 'next-of-kin*'))
        document.getElementById('mgmt-arrow').style.transform = 'rotate(180deg)';
    @endif

    @if(request()->is('managers*', 'supervisors*', 'secretaries*'))
        document.getElementById('roles-arrow').style.transform = 'rotate(180deg)';
    @endif

    function toggleMgmt() {
        var menu = document.getElementById('mgmt-menu');
        var arrow = document.getElementById('mgmt-arrow');
        var open = menu.style.maxHeight !== '0px' && menu.style.maxHeight !== '';
        menu.style.maxHeight = open ? '0px' : '200px';
        arrow.style.transform = open ? 'rotate(0deg)' : 'rotate(180deg)';
    }

    function toggleRoles() {
        var menu = document.getElementById('roles-menu');
        var arrow = document.getElementById('roles-arrow');
        var open = menu.style.maxHeight !== '0px' && menu.style.maxHeight !== '';
        menu.style.maxHeight = open ? '0px' : '200px';
        arrow.style.transform = open ? 'rotate(0deg)' : 'rotate(180deg)';
    }
</script>

</body>
</html>