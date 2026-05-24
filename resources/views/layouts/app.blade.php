<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — @yield('title', 'Dashboard')</title>

    {{-- Tabler Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono&display=swap" rel="stylesheet">

    {{-- Vite (Tailwind / app.css) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ── Base ─────────────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --brand:        #6B1F3A;
            --brand-dark:   #4E1329;
            --brand-light:  #C06080;
            --bg:           #F7F4F2;
            --surface:      #FFFFFF;
            --border:       rgba(0,0,0,0.08);
            --text:         #1A1A1A;
            --text-muted:   #6B6B6B;
            --text-hint:    #A0A0A0;
            --radius-md:    8px;
            --radius-lg:    12px;
            --font:         'DM Sans', sans-serif;
            --font-mono:    'DM Mono', monospace;
        }

        html, body { height: 100%; font-family: var(--font); background: var(--bg); color: var(--text); }

        /* ── Shell ────────────────────────────────────────── */
        .shell     { display: flex; height: 100vh; overflow: hidden; }
        .main      { flex: 1; display: flex; flex-direction: column; overflow: auto; }
        .content   { padding: 24px; display: flex; flex-direction: column; gap: 20px; }

        /* ── Sidebar ──────────────────────────────────────── */
        .sidebar {
            width: 220px; min-width: 220px;
            background: var(--brand);
            display: flex; flex-direction: column;
        }
        .sidebar-brand {
            padding: 20px 16px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .brand-icon {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 8px;
        }
        .brand-icon i  { font-size: 18px; color: #fff; }
        .brand-name    { font-size: 15px; font-weight: 600; color: #fff; }
        .brand-sub     { font-size: 9px; letter-spacing: 2px; color: rgba(255,255,255,0.45); text-transform: uppercase; margin-top: 2px; }

        .nav-section   { padding: 14px 0 4px; }
        .nav-label     { font-size: 9px; letter-spacing: 1.5px; color: rgba(255,255,255,0.35); text-transform: uppercase; padding: 0 16px; margin-bottom: 6px; }
        .nav-item      { display: flex; align-items: center; gap: 9px; padding: 8px 16px; font-size: 13px; color: rgba(255,255,255,0.65); cursor: pointer; transition: background .15s; text-decoration: none; }
        .nav-item:hover{ background: rgba(255,255,255,0.07); }
        .nav-item.active { background: rgba(255,255,255,0.14); color: #fff; }
        .nav-item i    { font-size: 15px; }

        .sidebar-footer {
            margin-top: auto; padding: 14px 16px;
            border-top: 1px solid rgba(255,255,255,0.1);
            display: flex; align-items: center; gap: 9px;
        }
        .avatar-sm {
            width: 30px; height: 30px; border-radius: 50%;
            background: var(--brand-light);
            display: flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 600; color: #fff; flex-shrink: 0;
        }
        .footer-name { font-size: 12px; color: #fff; font-weight: 500; }
        .footer-role { font-size: 10px; color: rgba(255,255,255,0.45); }

        /* ── Topbar ───────────────────────────────────────── */
        .topbar {
            height: 54px; background: var(--surface);
            border-bottom: 0.5px solid var(--border);
            display: flex; align-items: center; padding: 0 24px; gap: 6px; flex-shrink: 0;
        }
        .breadcrumb     { font-size: 20px; font-weight: 600; color: var(--text); }
        .breadcrumb-sep { color: var(--text-hint); margin: 0 6px; font-size: 13px; }
        .breadcrumb-sub { font-size: 13px; color: var(--text-muted); }
        .topbar-right   { margin-left: auto; display: flex; align-items: center; gap: 10px; }
        .icon-btn {
            width: 32px; height: 32px; border-radius: var(--radius-md);
            border: 0.5px solid var(--border); background: #F5F3F1;
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; color: var(--text-muted);
        }
        .avatar-top {
            width: 32px; height: 32px; border-radius: 50%;
            background: var(--brand);
            display: flex; align-items: center; justify-content: center;
            font-size: 11px; font-weight: 600; color: #fff;
        }

        /* ── Stat cards ───────────────────────────────────── */
        .stat-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }
        .stat-card {
            background: var(--surface); border-radius: var(--radius-lg);
            border: 0.5px solid var(--border); padding: 18px 20px;
        }
        .stat-card.accent   { background: var(--brand); border-color: var(--brand); }
        .stat-label         { font-size: 10px; letter-spacing: 1.2px; text-transform: uppercase; color: var(--text-hint); margin-bottom: 12px; }
        .stat-card.accent .stat-label { color: rgba(255,255,255,0.5); }
        .stat-icon {
            width: 32px; height: 32px; border-radius: 8px;
            background: rgba(255,255,255,0.13);
            display: flex; align-items: center; justify-content: center; margin-bottom: 12px;
        }
        .stat-icon i          { font-size: 16px; color: rgba(255,255,255,0.85); }
        .stat-icon-plain {
            width: 32px; height: 32px; border-radius: 8px;
            background: #F5F3F1;
            display: flex; align-items: center; justify-content: center; margin-bottom: 12px;
        }
        .stat-icon-plain i    { font-size: 16px; color: var(--text-muted); }
        .stat-num             { font-size: 30px; font-weight: 600; color: var(--text); line-height: 1; }
        .stat-card.accent .stat-num { color: #fff; }
        .stat-sub             { font-size: 11px; color: var(--text-hint); margin-top: 5px; }
        .stat-card.accent .stat-sub { color: rgba(255,255,255,0.45); }

        /* ── Two-column panels ────────────────────────────── */
        .panels { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        .panel {
            background: var(--surface); border-radius: var(--radius-lg);
            border: 0.5px solid var(--border); padding: 18px 20px;
        }
        .panel-head      { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
        .panel-title     { font-size: 14px; font-weight: 500; color: var(--text); }
        .panel-badge     { font-size: 10px; padding: 3px 9px; border-radius: 20px; background: #FEF0F0; color: #993556; font-weight: 500; }
        .panel-badge.blue{ background: #E6F1FB; color: #185FA5; }

        /* ── Supervisor rows ──────────────────────────────── */
        .sup-row         { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; }
        .sup-avatar      { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 600; flex-shrink: 0; }
        .sup-name        { font-size: 13px; font-weight: 500; color: var(--text); }
        .sup-id          { font-size: 11px; color: var(--text-hint); }
        .sup-branch      { font-size: 10px; padding: 2px 7px; border-radius: 20px; background: #F5F3F1; color: var(--text-muted); }
        .bar-wrap        { flex: 1; height: 4px; background: #F0EDE9; border-radius: 2px; overflow: hidden; margin: 0 10px; }
        .bar-fill        { height: 100%; border-radius: 2px; background: var(--brand-light); }
        .bar-label       { font-size: 11px; color: var(--text-muted); min-width: 28px; text-align: right; }
        .ok-badge        { font-size: 10px; padding: 2px 8px; border-radius: 20px; background: #EAF3DE; color: #3B6D11; font-weight: 500; margin-left: 4px; }

        /* ── Hierarchy ────────────────────────────────────── */
        .hier-row        { display: flex; align-items: center; gap: 10px; margin-bottom: 10px; flex-wrap: wrap; }
        .hier-icon {
            width: 32px; height: 32px; border-radius: var(--radius-md);
            border: 0.5px solid var(--border);
            display: flex; align-items: center; justify-content: center;
            color: var(--text-muted); flex-shrink: 0;
        }
        .role-pill       { font-size: 11px; font-weight: 500; padding: 3px 9px; border-radius: 20px; }
        .role-manager    { background: #FEF0F0; color: #72243E; }
        .role-supervisor { background: #E6F1FB; color: #185FA5; }
        .role-staff      { background: #F5F3F1; color: var(--text-muted); }
        .role-secretary  { background: #FAEEDA; color: #633806; }
        .null-tag        { font-size: 10px; background: #F5F3F1; border: 0.5px solid var(--border); color: var(--text-hint); padding: 2px 6px; border-radius: 4px; font-family: var(--font-mono); }
        .link-label      { font-size: 11px; color: var(--text-muted); }
        .meta-key        { font-size: 10px; color: var(--text-hint); }

        /* ── Position table ───────────────────────────────── */
        .pos-table       { width: 100%; border-collapse: collapse; }
        .pos-table th    { font-size: 10px; letter-spacing: 1px; text-transform: uppercase; color: var(--text-hint); font-weight: 500; padding: 0 0 10px; text-align: left; }
        .pos-table td    { font-size: 13px; color: var(--text); padding: 8px 0; border-top: 0.5px solid var(--border); }
        .pos-pill        { font-size: 11px; font-weight: 500; padding: 3px 10px; border-radius: 20px; display: inline-block; }
        .pos-count       { font-weight: 600; }
        .pos-rule        { color: var(--text-muted); font-size: 12px; }

        @media (max-width: 900px) {
            .stat-grid { grid-template-columns: repeat(2, 1fr); }
            .panels    { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="shell">

    {{-- ── Sidebar ─────────────────────────────── --}}
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon"><i class="ti ti-building"></i></div>
            <div class="brand-name">DreamHome</div>
            <div class="brand-sub">Property Management</div>
        </div>

        <nav>
            <div class="nav-section">
                <div class="nav-label">Overview</div>
                <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="ti ti-layout-dashboard"></i> Dashboard
                </a>
            </div>
            <div class="nav-section">
                <div class="nav-label">Manage</div>
                <a href="#" class="nav-item"><i class="ti ti-building-store"></i> Branches</a>
                <a href="#" class="nav-item"><i class="ti ti-users"></i> Staff</a>
                <a href="#" class="nav-item"><i class="ti ti-heart"></i> Next of Kin</a>
            </div>
            <div class="nav-section">
                <div class="nav-label">Role Subtypes</div>
                <a href="#" class="nav-item"><i class="ti ti-user-star"></i> Managers</a>
                <a href="#" class="nav-item"><i class="ti ti-user-check"></i> Supervisors</a>
                <a href="#" class="nav-item"><i class="ti ti-user"></i> Secretaries</a>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="avatar-sm">JW</div>
            <div>
                <div class="footer-name">J. Walker</div>
                <div class="footer-role">Administrator</div>
            </div>
        </div>
    </aside>

    {{-- ── Main ─────────────────────────────────── --}}
    <div class="main">

        {{-- Topbar --}}
        <div class="topbar">
            <span class="breadcrumb">@yield('page-title', 'Dashboard')</span>
            <span class="breadcrumb-sep"><i class="ti ti-chevron-right"></i></span>
            <span class="breadcrumb-sub">@yield('page-sub', 'Overview')</span>
            <div class="topbar-right">
                <div class="icon-btn"><i class="ti ti-bell"></i></div>
                <div class="icon-btn"><i class="ti ti-settings"></i></div>
                <div class="avatar-top">JW</div>
            </div>
        </div>

        {{-- Page content --}}
        <div class="content">
            @yield('content')
        </div>

    </div>
</div>

</body>
</html>