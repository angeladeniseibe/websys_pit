<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — Staff</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
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
            justify-content: space-between; margin-bottom: 18px;
            position: relative; z-index: 1;
        }
        .dh-logo { display: flex; align-items: center; gap: 10px; }
        .dh-logo-icon {
            width: 38px; height: 38px; background: rgba(255,255,255,0.15);
            border-radius: 10px; display: flex; align-items: center; justify-content: center;
        }
        .dh-logo-text { font-family: 'DM Serif Display', serif; font-size: 20px; color: #fff; }
        .dh-logo-sub { font-size: 11px; color: rgba(255,255,255,0.55); text-transform: uppercase; }
        .dh-page-title {
            font-family: 'DM Serif Display', serif; font-size: 30px;
            color: #fff; font-weight: 400; margin-bottom: 4px; position: relative; z-index: 1;
        }
        .dh-page-sub {
            font-size: 12px; color: rgba(255,255,255,0.55);
            display: flex; align-items: center; gap: 6px; position: relative; z-index: 1;
        }
        .dh-body { padding: 20px 28px 28px; }
        .branch-banner {
            display: flex; align-items: flex-start; gap: 9px;
            background: #E6F1FB; border-radius: 8px;
            padding: 10px 14px; margin-bottom: 14px;
            font-size: 11px; color: #0C447C; line-height: 1.6;
        }
        .branch-banner i { font-size: 15px; flex-shrink: 0; margin-top: 1px; color: #185FA5; }
        .stat-row {
            background: #fff; border: 0.5px solid #E8D0CE;
            border-radius: 10px; padding: 12px 14px;
            display: flex; align-items: center; gap: 10px; margin-bottom: 14px;
        }
        .stat-icon { width: 32px; height: 32px; border-radius: 8px; background: #FBEAF0; color: #72243E; display: flex; align-items: center; justify-content: center; font-size: 15px; }
        .stat-val { font-size: 20px; font-weight: 500; color: #4B1528; line-height: 1; }
        .stat-lbl { font-size: 10px; color: #993556; text-transform: uppercase; letter-spacing: 0.07em; margin-top: 2px; }
        .search-row { display: flex; gap: 8px; margin-bottom: 14px; }
        .search-wrap { flex: 1; position: relative; }
        .search-input {
            width: 100%; background: #fff; border: 0.5px solid #C4A8A4;
            border-radius: 8px; padding: 8px 12px 8px 34px;
            font-size: 12px; color: #3d2030; font-family: 'DM Sans', sans-serif; outline: none;
        }
        .search-input:focus { border-color: #993556; }
        .search-icon { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #993556; font-size: 14px; }
        .card { background: #fff; border: 0.5px solid #C4A8A4; border-radius: 12px; overflow: hidden; margin-bottom: 14px; }
        .card-head {
            display: flex; align-items: center; justify-content: space-between;
            padding: 11px 18px; border-bottom: 0.5px solid #EDD6D4; background: #FEF8F7;
        }
        .card-label { display: flex; align-items: center; gap: 7px; font-size: 11px; font-weight: 500; color: #72243E; text-transform: uppercase; }
        .badge { display: inline-flex; align-items: center; font-size: 10px; padding: 2px 9px; border-radius: 99px; font-weight: 600; }
        .badge-count { background: #4B1528; color: #F4C0D1; }
        .badge-position { background: #FBEAF0; color: #72243E; }
        .tbl-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th {
            padding: 9px 16px; text-align: left; font-size: 9px; font-weight: 600;
            color: #993556; text-transform: uppercase; letter-spacing: 0.07em;
            border-bottom: 0.5px solid #EDD6D4; background: #FEF8F7; white-space: nowrap;
        }
        td { padding: 9px 16px; border-bottom: 0.5px solid #F5E8E6; color: #3d2030; font-size: 12px; vertical-align: middle; white-space: nowrap; }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #FDF5F3; }
        .av-wrap { display: flex; align-items: center; gap: 8px; }
        .av {
            width: 26px; height: 26px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1); color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 8px; font-weight: 700; flex-shrink: 0;
            border: 1.5px solid #fff; box-shadow: 0 0 0 1px #E8D0CE;
        }
        .staff-id { font-family: 'Courier New', monospace; font-size: 11px; font-weight: 700; color: #72243E; background: #FBEAF0; padding: 2px 7px; border-radius: 5px; }
        .empty-state { text-align: center; color: #993556; padding: 32px 24px; }
        .empty-state i { font-size: 32px; opacity: 0.4; display: block; margin-bottom: 8px; }
        .empty-state p { font-size: 13px; }
        .readonly-note {
            display: flex; align-items: flex-start; gap: 9px;
            background: #FEF8F7; border: 0.5px solid #E8D0CE; border-radius: 8px;
            padding: 10px 14px; margin-bottom: 14px;
            font-size: 11px; color: #993556; line-height: 1.6;
        }
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
    <div class="dh-page-title">Staff List</div>
    <div class="dh-page-sub">
        <i class="ti ti-users" style="font-size:13px;"></i>
        Branch {{ $branchNo }} · Read-only view
    </div>
</div>

<div class="dh-body">

    {{-- Branch banner --}}
    <div class="branch-banner">
        <i class="ti ti-building"></i>
        <span>
            Showing staff for <strong>Branch {{ $branchNo }}</strong> only.
            Contact an administrator to make changes.
        </span>
    </div>

    {{-- Read-only note --}}
    <div class="readonly-note">
        <i class="ti ti-lock" style="font-size:15px;flex-shrink:0;margin-top:1px;"></i>
        <span>You have <strong>read-only</strong> access. Add, edit, and delete actions are restricted to administrators.</span>
    </div>

    {{-- Stat --}}
    <div class="stat-row">
        <div class="stat-icon"><i class="ti ti-users"></i></div>
        <div>
            <div class="stat-val">{{ $staff->count() }}</div>
            <div class="stat-lbl">Staff in Your Branch</div>
        </div>
    </div>

    {{-- Search --}}
    <div class="search-row">
        <div class="search-wrap">
            <i class="ti ti-search search-icon"></i>
            <input class="search-input" type="text" placeholder="Search name, position, staff ID…"
                   id="searchInput" oninput="filterTable(this.value)">
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-head">
            <div class="card-label">
                <i class="ti ti-table" style="font-size:14px;"></i>
                staff table
            </div>
            <span class="badge badge-count" id="recordCount">
                {{ $staff->count() }} record{{ $staff->count() !== 1 ? 's' : '' }}
            </span>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Staff_ID</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Sex</th>
                        <th>Date of Birth</th>
                        <th>Date Joined</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($staff as $member)
                    <tr>
                        <td><span class="staff-id">{{ $member->staff_id }}</span></td>
                        <td>
                            <div class="av-wrap">
                                <div class="av">
                                    {{ strtoupper(substr($member->first_name ?? 'X', 0, 1) . substr($member->last_name ?? 'X', 0, 1)) }}
                                </div>
                                <span>{{ $member->first_name ?? '—' }} {{ $member->last_name ?? '' }}</span>
                            </div>
                        </td>
                        <td><span class="badge badge-position">{{ $member->position ?? '—' }}</span></td>
                        <td>{{ $member->sex ?? '—' }}</td>
                        <td>{{ $member->date_of_birth ?? '—' }}</td>
                        <td>{{ $member->date_joined ?? '—' }}</td>
                        <td>£{{ number_format($member->salary ?? 0, 0) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="empty-state">
                                <i class="ti ti-user-off"></i>
                                <p>No staff found for Branch {{ $branchNo }}.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <a href="{{ route('manager.dashboard') }}" class="back-link">
        <i class="ti ti-arrow-left" style="font-size:14px;"></i> Back to Dashboard
    </a>

</div>

<script>
    function filterTable(query) {
        const q = query.toLowerCase().trim();
        const rows = document.querySelectorAll('#tableBody tr');
        let visible = 0;
        rows.forEach(row => {
            const show = !q || row.textContent.toLowerCase().includes(q);
            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });
        const el = document.getElementById('recordCount');
        if (el) el.textContent = visible + ' record' + (visible !== 1 ? 's' : '');
    }
</script>

</body>
</html>