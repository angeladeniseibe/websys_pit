<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — Staff Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'DM Sans', sans-serif; background: #FDF5F3; color: #3d2030; min-height: 100vh; }
        .dh-hero {
            background: linear-gradient(135deg, #4B1528 0%, #72243E 60%, #993556 100%);
            padding: 28px 32px 24px; position: relative; overflow: hidden;
        }
        .dh-hero::before {
            content: ''; position: absolute; top: -40px; right: -40px;
            width: 220px; height: 220px; border-radius: 50%; background: rgba(255,255,255,0.05);
        }
        .dh-hero-top {
            display: flex; align-items: flex-start;
            justify-content: space-between; margin-bottom: 18px; position: relative; z-index: 1;
        }
        .dh-logo { display: flex; align-items: center; gap: 10px; }
        .dh-logo-icon { width: 38px; height: 38px; background: rgba(255,255,255,0.15); border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .dh-logo-text { font-family: 'DM Serif Display', serif; font-size: 20px; color: #fff; letter-spacing: -0.3px; }
        .dh-logo-sub { font-size: 11px; color: rgba(255,255,255,0.55); letter-spacing: 0.08em; text-transform: uppercase; margin-top: 1px; }
        .dh-page-title { font-family: 'DM Serif Display', serif; font-size: 30px; color: #fff; font-weight: 400; letter-spacing: -0.5px; margin-bottom: 4px; position: relative; z-index: 1; }
        .dh-page-sub { font-size: 12px; color: rgba(255,255,255,0.55); display: flex; align-items: center; gap: 6px; position: relative; z-index: 1; }
        .btn-logout {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(255,255,255,0.12); color: rgba(255,255,255,0.85);
            border: 1px solid rgba(255,255,255,0.2); border-radius: 8px;
            padding: 7px 14px; font-size: 12px; font-weight: 500;
            font-family: 'DM Sans', sans-serif; cursor: pointer; transition: background 0.2s;
            position: relative; z-index: 1;
        }
        .btn-logout:hover { background: rgba(255,255,255,0.22); }
        .role-badge {
            display: inline-flex; align-items: center; gap: 5px;
            background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.25);
            border-radius: 99px; padding: 4px 10px;
            font-size: 10px; color: #F4C0D1; position: relative; z-index: 1;
        }
        .dh-body { padding: 20px 28px 28px; }
        .branch-card {
            background: #fff; border: 0.5px solid #C4A8A4; border-radius: 12px;
            padding: 16px 18px; margin-bottom: 16px;
            display: flex; align-items: center; gap: 14px;
        }
        .branch-icon { width: 40px; height: 40px; background: #FBEAF0; border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 18px; color: #72243E; flex-shrink: 0; }
        .branch-name { font-family: 'DM Serif Display', serif; font-size: 16px; color: #4B1528; }
        .branch-meta { font-size: 11px; color: #993556; margin-top: 2px; }
        .info-note {
            display: flex; align-items: flex-start; gap: 9px;
            background: #E6F1FB; border-radius: 8px;
            padding: 10px 14px; margin-bottom: 16px;
            font-size: 11px; color: #0C447C; line-height: 1.6;
        }
        .info-note i { font-size: 15px; flex-shrink: 0; margin-top: 1px; color: #185FA5; }
        .stats-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 18px; }
        .stat-card { background: #fff; border: 0.5px solid #E8D0CE; border-radius: 10px; padding: 14px; display: flex; align-items: center; gap: 10px; }
        .stat-icon { width: 34px; height: 34px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .stat-icon.pink { background: #FBEAF0; color: #72243E; }
        .stat-icon.gold { background: #FAEEDA; color: #633806; }
        .stat-val { font-size: 22px; font-weight: 500; color: #4B1528; line-height: 1; }
        .stat-lbl { font-size: 10px; color: #993556; text-transform: uppercase; letter-spacing: 0.07em; margin-top: 2px; }
        .nav-section-title { font-size: 10px; font-weight: 600; color: #993556; text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 10px; }
        .nav-grid { display: flex; flex-direction: column; gap: 8px; margin-bottom: 20px; }
        .nav-card {
            background: #fff; border: 0.5px solid #C4A8A4; border-radius: 10px;
            padding: 12px 16px; display: flex; align-items: center; gap: 12px;
            text-decoration: none; color: #3d2030;
            transition: box-shadow 0.2s, border-color 0.2s;
        }
        .nav-card:hover { box-shadow: 0 2px 10px rgba(75,21,40,0.1); border-color: #993556; }
        .nav-card-icon { width: 34px; height: 34px; border-radius: 8px; background: #FBEAF0; color: #72243E; display: flex; align-items: center; justify-content: center; font-size: 16px; flex-shrink: 0; }
        .nav-card-title { font-size: 13px; font-weight: 500; color: #4B1528; }
        .nav-card-sub { font-size: 10px; color: #993556; margin-top: 1px; }
        .nav-card-arrow { margin-left: auto; color: #C4A8A4; font-size: 16px; }
    </style>
</head>
<body>

<div class="dh-hero">
    <div class="dh-hero-top">
        <div class="dh-logo">
            <div class="dh-logo-icon">
                <i class="ti ti-home-2" style="font-size:18px;color:#fff;"></i>
            </div>
            <div>
                <div class="dh-logo-text">DreamHome</div>
                <div class="dh-logo-sub">Management Network</div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="ti ti-logout" style="font-size:13px;"></i> Logout
            </button>
        </form>
    </div>

    <div class="dh-page-title">Welcome, {{ auth()->user()->name }}</div>
    <div class="dh-page-sub">
        <i class="ti ti-shield-check" style="font-size:13px;"></i>
        Staff Dashboard · Read-only access
    </div>

    <div style="display:flex;gap:8px;flex-wrap:wrap;margin-top:10px;position:relative;z-index:1;">
        <span class="role-badge">
            <i class="ti ti-user" style="font-size:11px;"></i> Staff
        </span>
        <span class="role-badge">
            <i class="ti ti-building" style="font-size:11px;"></i>
            Branch {{ $branchNo }}
        </span>
    </div>
</div>

<div class="dh-body">

    {{-- Branch info --}}
    @if($branch)
    <div class="branch-card">
        <div class="branch-icon"><i class="ti ti-building-store"></i></div>
        <div>
            <div class="branch-name">{{ $branch->city ?? 'Branch' }} Office</div>
            <div class="branch-meta">
                {{ $branch->street ?? '' }}
                @if($branch->postcode), {{ $branch->postcode }}@endif
                · Tel: {{ $branch->telephone ?? '—' }}
            </div>
        </div>
    </div>
    @endif

    {{-- Info note --}}
    <div class="info-note">
        <i class="ti ti-info-circle"></i>
        <span>
            You have <strong>read-only</strong> access as a Staff member.
            You can view your branch info and your own profile.
            Contact your supervisor or manager for any changes.
        </span>
    </div>

    {{-- Stats --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon pink"><i class="ti ti-building"></i></div>
            <div>
                <div class="stat-val">{{ $branchNo }}</div>
                <div class="stat-lbl">Your Branch</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon gold"><i class="ti ti-calendar"></i></div>
            <div>
                <div class="stat-val">
                    {{ $staff && $staff->date_joined ? \Carbon\Carbon::parse($staff->date_joined)->format('Y') : '—' }}
                </div>
                <div class="stat-lbl">Year Joined</div>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <div class="nav-section-title">Quick Access</div>
    <div class="nav-grid">
        <a href="{{ route('staff.profile') }}" class="nav-card">
            <div class="nav-card-icon"><i class="ti ti-user"></i></div>
            <div>
                <div class="nav-card-title">My Profile</div>
                <div class="nav-card-sub">View your personal staff details</div>
            </div>
            <i class="ti ti-chevron-right nav-card-arrow"></i>
        </a>
    </div>

</div>

</body>
</html>