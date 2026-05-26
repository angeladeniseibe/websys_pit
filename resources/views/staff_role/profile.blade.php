<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — My Profile</title>
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
        .dh-hero-top { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 18px; position: relative; z-index: 1; }
        .dh-logo { display: flex; align-items: center; gap: 10px; }
        .dh-logo-icon { width: 38px; height: 38px; background: rgba(255,255,255,0.15); border-radius: 10px; display: flex; align-items: center; justify-content: center; }
        .dh-logo-text { font-family: 'DM Serif Display', serif; font-size: 20px; color: #fff; letter-spacing: -0.3px; }
        .dh-logo-sub { font-size: 11px; color: rgba(255,255,255,0.55); text-transform: uppercase; margin-top: 1px; }
        .dh-page-title { font-family: 'DM Serif Display', serif; font-size: 30px; color: #fff; font-weight: 400; margin-bottom: 4px; position: relative; z-index: 1; }
        .dh-page-sub { font-size: 12px; color: rgba(255,255,255,0.55); display: flex; align-items: center; gap: 6px; position: relative; z-index: 1; }
        .dh-body { padding: 20px 28px 28px; }
        .readonly-note {
            display: flex; align-items: flex-start; gap: 9px;
            background: #FEF8F7; border: 0.5px solid #E8D0CE; border-radius: 8px;
            padding: 10px 14px; margin-bottom: 14px;
            font-size: 11px; color: #993556; line-height: 1.6;
        }
        .profile-card { background: #fff; border: 0.5px solid #C4A8A4; border-radius: 12px; overflow: hidden; margin-bottom: 14px; }
        .profile-card-head {
            background: linear-gradient(135deg, #FBEAF0, #F4C0D1);
            padding: 20px 18px; display: flex; align-items: center; gap: 14px;
            border-bottom: 0.5px solid #EDD6D4;
        }
        .profile-av {
            width: 56px; height: 56px; border-radius: 50%;
            background: linear-gradient(135deg, #72243E, #993556); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; font-weight: 700; flex-shrink: 0;
            border: 3px solid #fff; box-shadow: 0 2px 8px rgba(75,21,40,0.2);
        }
        .profile-name { font-family: 'DM Serif Display', serif; font-size: 20px; color: #4B1528; }
        .profile-pos { font-size: 11px; color: #993556; margin-top: 3px; }
        .staff-id-badge {
            font-family: 'Courier New', monospace; font-size: 11px; font-weight: 700;
            color: #72243E; background: #fff; padding: 2px 8px;
            border-radius: 5px; margin-top: 4px; display: inline-block;
        }
        .detail-section { padding: 16px 18px; }
        .detail-section-title {
            font-size: 9px; font-weight: 600; color: #993556;
            text-transform: uppercase; letter-spacing: 0.08em;
            margin-bottom: 12px; padding-bottom: 6px;
            border-bottom: 0.5px solid #EDD6D4;
        }
        .detail-row {
            display: flex; justify-content: space-between; align-items: flex-start;
            padding: 7px 0; border-bottom: 0.5px solid #F5E8E6; gap: 12px;
        }
        .detail-row:last-child { border-bottom: none; }
        .detail-label { font-size: 10px; color: #993556; text-transform: uppercase; letter-spacing: 0.06em; flex-shrink: 0; }
        .detail-value { font-size: 12px; color: #3d2030; text-align: right; }
        .detail-value.mono { font-family: 'Courier New', monospace; font-size: 11px; color: #72243E; }
        .supervisor-card {
            background: #EAF3DE; border: 0.5px solid #C3DFA8;
            border-radius: 10px; padding: 14px 18px;
            display: flex; align-items: center; gap: 12px;
            margin-bottom: 14px;
        }
        .supervisor-icon { width: 38px; height: 38px; border-radius: 8px; background: #27500A; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
        .supervisor-name { font-size: 14px; font-weight: 500; color: #27500A; }
        .supervisor-lbl { font-size: 10px; color: #639922; text-transform: uppercase; letter-spacing: 0.07em; margin-top: 2px; }
        .back-link { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; color: #993556; text-decoration: none; padding: 4px 0; }
        .back-link:hover { color: #4B1528; }
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
    </div>
    <div class="dh-page-title">My Profile</div>
    <div class="dh-page-sub">
        <i class="ti ti-user" style="font-size:13px;"></i>
        Staff · Personal details
    </div>
</div>

<div class="dh-body">

    <div class="readonly-note">
        <i class="ti ti-lock" style="font-size:15px;flex-shrink:0;margin-top:1px;"></i>
        <span>You have <strong>read-only</strong> access. Contact your supervisor or manager to update your records.</span>
    </div>

    @if($staff)

    {{-- Profile header --}}
    <div class="profile-card">
        <div class="profile-card-head">
            <div class="profile-av">
                {{ strtoupper(substr($staff->first_name ?? 'X', 0, 1) . substr($staff->last_name ?? 'X', 0, 1)) }}
            </div>
            <div>
                <div class="profile-name">{{ $staff->first_name }} {{ $staff->last_name }}</div>
                <div class="profile-pos">{{ $staff->position }} · Branch {{ $staff->branch_no }}</div>
                <span class="staff-id-badge">{{ $staff->staff_id }}</span>
            </div>
        </div>

        {{-- Personal details --}}
        <div class="detail-section">
            <div class="detail-section-title">Personal Information</div>
            <div class="detail-row">
                <span class="detail-label">Sex</span>
                <span class="detail-value">{{ $staff->sex === 'M' ? 'Male' : 'Female' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Date of Birth</span>
                <span class="detail-value">{{ $staff->dob ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">NIN</span>
                <span class="detail-value mono">{{ $staff->nin ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Telephone</span>
                <span class="detail-value">{{ $staff->telephone ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Address</span>
                <span class="detail-value">{{ $staff->street ?? '—' }}, {{ $staff->city ?? '' }}</span>
            </div>
        </div>

        {{-- Work details --}}
        <div class="detail-section" style="border-top: 0.5px solid #EDD6D4;">
            <div class="detail-section-title">Work Information</div>
            <div class="detail-row">
                <span class="detail-label">Branch</span>
                <span class="detail-value">{{ $staff->branch_no ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Position</span>
                <span class="detail-value">{{ $staff->position ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Date Joined</span>
                <span class="detail-value">{{ $staff->date_joined ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-label">Salary</span>
                <span class="detail-value">₱{{ number_format($staff->salary ?? 0, 0) }} / year</span>
            </div>
        </div>
    </div>

    {{-- Supervisor info --}}
    @if($staff->supervisor)
    <div class="supervisor-card">
        <div class="supervisor-icon"><i class="ti ti-user-check"></i></div>
        <div>
            <div class="supervisor-name">
                {{ $staff->supervisor->first_name }} {{ $staff->supervisor->last_name }}
            </div>
            <div class="supervisor-lbl">Your Supervisor · {{ $staff->supervisor_no }}</div>
        </div>
    </div>
    @endif

    @else
    <div style="text-align:center;padding:40px;color:#993556;opacity:0.6;">
        <i class="ti ti-user-off" style="font-size:36px;display:block;margin-bottom:10px;"></i>
        <p>No profile found. Contact your administrator.</p>
    </div>
    @endif

    <a href="{{ route('staff.dashboard') }}" class="back-link">
        <i class="ti ti-arrow-left" style="font-size:14px;"></i> Back to Dashboard
    </a>

</div>

</body>
</html>