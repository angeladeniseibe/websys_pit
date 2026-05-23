<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — Secretaries</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', 'Segoe UI', system-ui, sans-serif;
            background: #FDF5F3;
            color: #3d2030;
            min-height: 100vh;
        }

        /* ── Hero ── */
        .dh-hero {
            background: linear-gradient(135deg, #4B1528 0%, #72243E 60%, #993556 100%);
            padding: 28px 32px 20px;
            position: relative;
            overflow: hidden;
        }
        .dh-hero::before {
            content: '';
            position: absolute;
            top: -40px; right: -40px;
            width: 220px; height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }
        .dh-hero::after {
            content: '';
            position: absolute;
            bottom: -60px; left: 30%;
            width: 180px; height: 180px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        .dh-hero-top {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 18px;
            position: relative;
            z-index: 1;
        }

        .dh-logo { display: flex; align-items: center; gap: 10px; }
        .dh-logo-icon {
            width: 38px; height: 38px;
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .dh-logo-text {
            font-family: 'DM Serif Display', serif;
            font-size: 20px;
            color: #fff;
            letter-spacing: -0.3px;
        }
        .dh-logo-sub {
            font-size: 11px;
            color: rgba(255,255,255,0.55);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-top: 1px;
        }

        .btn-add {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(255,255,255,0.15);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 8px;
            padding: 8px 16px;
            font-size: 12px; font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            transition: background 0.2s;
            position: relative; z-index: 1;
        }
        .btn-add:hover { background: rgba(255,255,255,0.25); }

        .dh-page-title {
            font-family: 'DM Serif Display', serif;
            font-size: 30px;
            color: #fff;
            font-weight: 400;
            letter-spacing: -0.5px;
            margin-bottom: 4px;
            position: relative; z-index: 1;
        }
        .dh-page-sub {
            font-size: 12px;
            color: rgba(255,255,255,0.55);
            display: flex; align-items: center; gap: 6px;
            position: relative; z-index: 1;
        }

        .info-bar {
            display: flex; align-items: flex-start; gap: 8px;
            background: rgba(255,255,255,0.10);
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 8px;
            padding: 10px 14px; margin-top: 14px;
            font-size: 11px; color: rgba(255,255,255,0.75); line-height: 1.6;
            position: relative; z-index: 1;
        }
        .info-bar i { font-size: 14px; flex-shrink: 0; margin-top: 2px; color: #F4C0D1; }
        .info-bar code {
            font-family: monospace; font-size: 10px;
            background: rgba(255,255,255,0.15);
            padding: 1px 5px; border-radius: 4px; color: #F4C0D1;
        }

        /* ── Flash ── */
        .flash-ok {
            display: flex; align-items: flex-start; gap: 8px;
            background: #EAF3DE; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 14px;
            font-size: 12px; color: #27500A;
        }

        /* ── Body ── */
        .dh-body { padding: 20px 28px 28px; }

        /* ── Stat ── */
        .dh-stat {
            background: #fff;
            border: 0.5px solid #E8D0CE;
            border-radius: 10px;
            padding: 12px 14px;
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 18px;
        }
        .dh-stat-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; flex-shrink: 0;
            background: #FBEAF0; color: #72243E;
        }
        .dh-stat-val {
            font-size: 20px; font-weight: 500;
            color: #4B1528; line-height: 1;
        }
        .dh-stat-lbl {
            font-size: 10px; color: #993556;
            text-transform: uppercase; letter-spacing: 0.07em; margin-top: 2px;
        }

        /* ── Search ── */
        .search-row { display: flex; gap: 8px; margin-bottom: 14px; }
        .search-wrap { flex: 1; position: relative; }
        .search-input {
            width: 100%;
            background: #fff;
            border: 0.5px solid #C4A8A4;
            border-radius: 8px;
            padding: 8px 12px 8px 34px;
            font-size: 12px; color: #3d2030;
            font-family: 'DM Sans', sans-serif;
            outline: none;
        }
        .search-input:focus { border-color: #993556; }
        .search-icon {
            position: absolute; left: 10px; top: 50%;
            transform: translateY(-50%);
            color: #993556; font-size: 14px; pointer-events: none;
        }

        /* ── Card ── */
        .card {
            background: #fff;
            border: 0.5px solid #C4A8A4;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 14px;
        }
        .card-head {
            display: flex; align-items: center; justify-content: space-between;
            padding: 11px 18px;
            border-bottom: 0.5px solid #EDD6D4;
            background: #FEF8F7;
        }
        .card-label {
            display: flex; align-items: center; gap: 7px;
            font-size: 11px; font-weight: 500;
            color: #72243E;
            letter-spacing: 0.04em; text-transform: uppercase;
        }

        /* ── Badges ── */
        .badge {
            display: inline-flex; align-items: center;
            font-size: 10px; padding: 2px 9px;
            border-radius: 99px; font-weight: 600; white-space: nowrap;
        }
        .badge-branch { background: #E6F1FB; color: #185FA5; font-family: monospace; }
        .badge-sup    { background: #E6F1FB; color: #0C447C; font-family: monospace; }
        .badge-count  { background: #4B1528; color: #F4C0D1; }
        .badge-speed  { background: #EAF3DE; color: #27500A; }
        .badge-slow   { background: #FAEEDA; color: #633806; }

        /* ── Table ── */
        .tbl-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }
        th {
            padding: 9px 16px; text-align: left;
            font-size: 9px; font-weight: 600; color: #993556;
            text-transform: uppercase; letter-spacing: 0.07em;
            border-bottom: 0.5px solid #EDD6D4; background: #FEF8F7;
            white-space: nowrap;
        }
        td {
            padding: 9px 16px; border-bottom: 0.5px solid #F5E8E6;
            color: #3d2030; font-size: 12px; vertical-align: middle;
            white-space: nowrap;
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #FDF5F3; }

        /* ── Avatar ── */
        .av-wrap { display: flex; align-items: center; gap: 8px; }
        .av {
            width: 26px; height: 26px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1);
            color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 8px; font-weight: 700; flex-shrink: 0;
            border: 1.5px solid #fff;
            box-shadow: 0 0 0 1px #E8D0CE;
        }

        /* ── Staff ID pill ── */
        .staff-id {
            font-family: 'Courier New', monospace;
            font-size: 11px; font-weight: 700;
            color: #72243E;
            background: #FBEAF0;
            padding: 2px 7px; border-radius: 5px;
        }

        /* ── Null val ── */
        .null-val { color: #B4B2A9; font-style: italic; }

        /* ── Action buttons ── */
        .action-wrap { display: flex; align-items: center; gap: 6px; }
        .btn-icon {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px; border-radius: 7px;
            border: 0.5px solid; cursor: pointer;
            text-decoration: none;
            transition: background .15s, border-color .15s;
            font-size: 14px;
        }
        .btn-icon.edit   { background: #EEF4FF; border-color: #B8D0F8; color: #2255CC; }
        .btn-icon.edit:hover { background: #D8E9FF; }
        .btn-icon.delete { background: #FEF0F0; border-color: #F5C0C0; color: #C0392B; }
        .btn-icon.delete:hover { background: #FDDEDE; }

        /* ── Confirm bar ── */
        .confirm-bar {
            display: flex; align-items: flex-start; gap: 9px;
            background: #EAF3DE; border-radius: 8px;
            padding: 10px 14px; margin-bottom: 14px;
            font-size: 11px; color: #27500A; line-height: 1.6;
        }
        .confirm-bar i { font-size: 15px; flex-shrink: 0; margin-top: 1px; }

        /* ── Empty state ── */
        .empty-state {
            text-align: center; color: #993556; padding: 32px 24px;
        }
        .empty-state i { font-size: 32px; opacity: 0.4; display: block; margin-bottom: 8px; }
        .empty-state p { font-size: 13px; }

        /* ── Back link ── */
        .back-link {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; color: #993556;
            text-decoration: none; padding: 4px 0;
        }
        .back-link:hover { color: #4B1528; }

        /* ── Delete modal ── */
        .modal-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(75,21,40,0.35);
            backdrop-filter: blur(2px);
            z-index: 100; align-items: center; justify-content: center;
        }
        .modal-overlay.active { display: flex; }
        .modal {
            background: #fff; border-radius: 14px; padding: 24px;
            max-width: 360px; width: 90%;
            box-shadow: 0 12px 40px rgba(75,21,40,0.18);
        }
        .modal-icon {
            width: 44px; height: 44px; border-radius: 50%;
            background: #FEF0F0; color: #C0392B;
            display: flex; align-items: center; justify-content: center;
            font-size: 22px; margin-bottom: 14px;
        }
        .modal-title { font-family: 'DM Serif Display', serif; font-size: 18px; color: #3d2030; margin-bottom: 6px; }
        .modal-body  { font-size: 12px; color: #72243E; line-height: 1.6; margin-bottom: 18px; }
        .modal-actions { display: flex; gap: 8px; }
        .btn-modal-cancel {
            flex: 1; padding: 9px;
            border: 0.5px solid #C4A8A4; border-radius: 8px;
            background: transparent; color: #993556;
            font-size: 13px; font-family: 'DM Sans', sans-serif; cursor: pointer;
        }
        .btn-modal-cancel:hover { background: #FEF8F7; }
        .btn-modal-delete {
            flex: 1; padding: 9px; border: none; border-radius: 8px;
            background: #C0392B; color: #fff;
            font-size: 13px; font-weight: 500;
            font-family: 'DM Sans', sans-serif; cursor: pointer; width: 100%;
        }
        .btn-modal-delete:hover { background: #A93226; }
    </style>
</head>
<body>

{{-- ── Hero Header ── --}}
<div class="dh-hero">
    <div class="dh-hero-top">
        <div class="dh-logo">
            <div class="dh-logo-icon">
                <i class="ti ti-home-2" style="font-size:18px;color:#fff;"></i>
            </div>
            <div>
                <div class="dh-logo-text">DreamHome</div>
                <div class="dh-logo-sub">Secretary Network</div>
            </div>
        </div>
        @if(auth()->user()->isAdmin())
        <a href="{{ route('secretaries.create') }}" class="btn-add">
            <i class="ti ti-plus" style="font-size:13px;"></i> Add Secretary
        </a>
        @endif
    </div>

    <div class="dh-page-title">Secretaries</div>
    <div class="dh-page-sub">
        <i class="ti ti-id-badge" style="font-size:13px;"></i>
        Staff subtype · Administrative records
    </div>

    <div class="info-bar">
        <i class="ti ti-info-circle"></i>
        <span>
            Subtype of Staff. <code>typing_speed</code> (words per minute) is required —
            <code>NOT NULL</code> enforced at the database level.
        </span>
    </div>
</div>

{{-- ── Body ── --}}
<div class="dh-body">

    @if(session('success'))
    <div class="flash-ok">
        <i class="ti ti-circle-check" style="font-size:14px;flex-shrink:0;margin-top:2px;"></i>
        {{ session('success') }}
    </div>
    @endif

    {{-- Single stat --}}
    <div class="dh-stat">
        <div class="dh-stat-icon">
            <i class="ti ti-users"></i>
        </div>
        <div>
            <div class="dh-stat-val">{{ $secretaries->count() }}</div>
            <div class="dh-stat-lbl">Total Secretaries</div>
        </div>
    </div>

    {{-- Search --}}
    <div class="search-row">
        <div class="search-wrap">
            <i class="ti ti-search search-icon"></i>
            <input
                class="search-input"
                type="text"
                placeholder="Search secretary, branch, supervisor no…"
                id="searchInput"
                oninput="filterTable(this.value)"
            >
        </div>
    </div>

    {{-- Table card --}}
    <div class="card">
        <div class="card-head">
            <div class="card-label">
                <i class="ti ti-table" style="font-size:14px;"></i>
                secretary table
            </div>
            <span class="badge badge-count" id="recordCount">
                {{ $secretaries->count() }} record{{ $secretaries->count() !== 1 ? 's' : '' }}
            </span>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Staff_ID</th>
                        <th>Name</th>
                        <th>Branch</th>
                        <th>Supervisor_No</th>
                        <th>Typing Speed (WPM)</th>
                        @if(auth()->user()->isAdmin())
                        <th>Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($secretaries as $sec)
                    @php
                        $speed = $sec->typing_speed ?? null;
                        $speedClass = ($speed && $speed >= 60) ? 'badge-speed' : 'badge-slow';
                    @endphp
                    <tr>
                        <td>
                            <span class="staff-id">{{ $sec->staff_id }}</span>
                        </td>
                        <td>
                            <div class="av-wrap">
                                <div class="av">
                                    {{ strtoupper(substr($sec->staff->first_name ?? 'X', 0, 1) . substr($sec->staff->last_name ?? 'X', 0, 1)) }}
                                </div>
                                <span>{{ $sec->staff->first_name ?? '—' }} {{ $sec->staff->last_name ?? '' }}</span>
                            </div>
                        </td>
                        <td>
                            <span class="badge badge-branch">{{ $sec->staff->branch_no ?? '—' }}</span>
                        </td>
                        <td>
                            @if($sec->supervisor_no ?? null)
                                <span class="badge badge-sup">{{ $sec->supervisor_no }}</span>
                            @else
                                <span class="null-val">NULL</span>
                            @endif
                        </td>
                        <td>
                            @if($speed)
                                <span class="badge {{ $speedClass }}">{{ $speed }} wpm</span>
                            @else
                                <span class="null-val">—</span>
                            @endif
                        </td>
                        @if(auth()->user()->isAdmin())
                        <td>
                            <div class="action-wrap">
                                <a href="{{ route('secretaries.edit', $sec->staff_id) }}"
                                   class="btn-icon edit" title="Edit">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <button type="button"
                                        class="btn-icon delete" title="Delete"
                                        onclick="confirmDelete(
                                            '{{ $sec->staff_id }}',
                                            '{{ addslashes($sec->staff->first_name ?? '') }} {{ addslashes($sec->staff->last_name ?? '') }}'
                                        )">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ auth()->user()->isAdmin() ? 6 : 5 }}">
                            <div class="empty-state">
                                <i class="ti ti-user-off"></i>
                                <p>No secretary records found.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Note --}}
    <div class="confirm-bar">
        <i class="ti ti-circle-check"></i>
        <span>
            <strong>typing_speed</strong> is <code>NOT NULL</code> at the database level.
            Speeds at or above <strong>60 wpm</strong> are highlighted in green; below 60 wpm in amber.
        </span>
    </div>

    <a href="{{ route('dashboard') }}" class="back-link">
        <i class="ti ti-arrow-left" style="font-size:14px;"></i> Back to Dashboard
    </a>

</div>

{{-- ── Delete Modal — action set by JS, no Blade variables ── --}}
<div class="modal-overlay" id="deleteModal">
    <div class="modal">
        <div class="modal-icon"><i class="ti ti-trash"></i></div>
        <div class="modal-title">Remove Secretary</div>
        <div class="modal-body" id="modalBody">
            Are you sure you want to remove this secretary record? This action cannot be undone.
        </div>
        <div class="modal-actions">
            <button class="btn-modal-cancel" onclick="closeModal()">Cancel</button>
            <form id="deleteForm" method="POST" style="flex:1;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-modal-delete">Yes, Remove</button>
            </form>
        </div>
    </div>
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

    function confirmDelete(staffId, name) {
        document.getElementById('modalBody').textContent =
            `Are you sure you want to remove ${name.trim()} as a secretary? This action cannot be undone.`;
        document.getElementById('deleteForm').action = `/secretaries/${staffId}`;
        document.getElementById('deleteModal').classList.add('active');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.remove('active');
    }

    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });
</script>

</body>
</html>