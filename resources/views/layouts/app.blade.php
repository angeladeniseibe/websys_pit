<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <style>
        :root { --brand: #6B1F3A; --bg: #F7F4F2; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg); display: flex; height: 100vh; overflow: hidden; margin: 0; }
        .sidebar { width: 220px; background: var(--brand); color: #fff; padding: 20px; display: flex; flex-direction: column; }
        .nav-section { margin-bottom: 20px; }
        .nav-label { font-size: 10px; color: rgba(255,255,255,0.5); text-transform: uppercase; margin-bottom: 8px; letter-spacing: 1px; }
        .nav-item { display: flex; align-items: center; gap: 10px; padding: 10px; color: rgba(255,255,255,0.8); text-decoration: none; font-size: 14px; border-radius: 6px; }
        .nav-item:hover, .nav-item.active { background: rgba(255,255,255,0.15); color: #fff; }
        .main { flex: 1; overflow-y: auto; padding: 24px; }
    </style>
</head>
<body>
<aside class="sidebar">
    <h3 style="margin-bottom: 20px;">DreamHome</h3>
    
    <div class="nav-section">
        <div class="nav-label">Overview</div>
        <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
    </div>

    <div class="nav-section">
        <div class="nav-label">Portfolio Registries</div>
        <a href="{{ route('properties.index') }}" class="nav-item {{ request()->routeIs('properties.*') ? 'active' : '' }}">Property Records</a>
        <a href="{{ route('owners.index') }}" class="nav-item {{ request()->routeIs('owners.*') ? 'active' : '' }}">Owner Records</a>
    </div>

    <div class="nav-section">
        <div class="nav-label">Manage</div>
        <a href="{{ route('branches.index') }}" class="nav-item {{ request()->routeIs('branches.*') ? 'active' : '' }}">Branches</a>
        <a href="{{ route('staff.index') }}" class="nav-item {{ request()->routeIs('staff.*') ? 'active' : '' }}">Staff</a>
        <a href="{{ route('next-of-kin.index') }}" class="nav-item {{ request()->routeIs('next-of-kin.*') ? 'active' : '' }}">Next of Kin</a>
    </div>
</aside>

    <main class="main">
        @yield('content')
    </main>
</body>
</html>