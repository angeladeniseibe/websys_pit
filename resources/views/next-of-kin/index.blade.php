<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Next of Kin — DreamHome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
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
            content: ''; position: absolute;
            top: -40px; right: -40px;
            width: 220px; height: 220px; border-radius: 50%;
            background: rgba(255,255,255,0.05);
        }
        .dh-hero::after {
            content: ''; position: absolute;
            bottom: -60px; left: 30%;
            width: 180px; height: 180px; border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }

        .dh-hero-top {
            display: flex; align-items: flex-start;
            justify-content: space-between; margin-bottom: 18px;
            position: relative; z-index: 1;
        }

        .dh-logo { display: flex; align-items: center; gap: 10px; }
        .dh-logo-icon {
            width: 38px; height: 38px;
            background: rgba(255,255,255,0.15);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
        }
        .dh-logo-text { font-family: 'DM Serif Display', serif; font-size: 20px; color: #fff; letter-spacing: -0.3px; }
        .dh-logo-sub  { font-size: 11px; color: rgba(255,255,255,0.55); letter-spacing: 0.08em; text-transform: uppercase; margin-top: 1px; }

        .hero-actions { display: flex; align-items: center; gap: 8px; position: relative; z-index: 1; }

        .sel-hero {
            padding: 8px 12px;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 8px;
            font-size: 12px; font-weight: 500;
            background: rgba(255,255,255,0.12);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            outline: none; cursor: pointer;
        }
        .sel-hero option { background: #4B1528; color: #fff; }

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
        }
        .btn-add:hover { background: rgba(255,255,255,0.25); }

        .dh-page-title {
            font-family: 'DM Serif Display', serif;
            font-size: 30px; color: #fff; font-weight: 400;
            letter-spacing: -0.5px; margin-bottom: 4px;
            position: relative; z-index: 1;
        }
        .dh-page-sub {
            font-size: 12px; color: rgba(255,255,255,0.55);
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
        .info-bar code { font-family: monospace; font-size: 10px; background: rgba(255,255,255,0.15); padding: 1px 5px; border-radius: 4px; color: #F4C0D1; }

        /* ── Flash ── */
        .flash-ok  { display:flex;align-items:flex-start;gap:8px;background:#EAF3DE;border-radius:8px;padding:9px 14px;margin-bottom:14px;font-size:12px;color:#27500A; }
        .flash-err { display:flex;align-items:flex-start;gap:8px;background:#FCEBEB;border-radius:8px;padding:9px 14px;margin-bottom:14px;font-size:12px;color:#A32D2D; }

        /* ── Body ── */
        .dh-body { padding: 20px 28px 28px; }

        /* ── Stats ── */
        .dh-stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 18px; }
        .dh-stat {
            background: #fff; border: 0.5px solid #E8D0CE;
            border-radius: 10px; padding: 12px 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .dh-stat-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; }
        .dh-stat-icon.pink   { background: #FBEAF0; color: #72243E; }
        .dh-stat-icon.rose   { background: #F4C0D1; color: #4B1528; }
        .dh-stat-icon.green  { background: #EAF3DE; color: #27500A; }
        .dh-stat-icon.blue   { background: #E6F1FB; color: #185FA5; }
        .dh-stat-icon.amber  { background: #FAEEDA; color: #633806; }
        .dh-stat-val { font-size: 20px; font-weight: 500; color: #4B1528; line-height: 1; }
        .dh-stat-lbl { font-size: 10px; color: #993556; text-transform: uppercase; letter-spacing: 0.07em; margin-top: 2px; }

        /* ── Search ── */
        .search-row { display: flex; gap: 8px; margin-bottom: 14px; }
        .search-wrap { flex: 1; position: relative; }
        .search-input {
            width: 100%; background: #fff;
            border: 0.5px solid #C4A8A4; border-radius: 8px;
            padding: 8px 12px 8px 34px;
            font-size: 12px; color: #3d2030;
            font-family: 'DM Sans', sans-serif; outline: none;
        }
        .search-input:focus { border-color: #993556; }
        .search-icon { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); color: #993556; font-size: 14px; pointer-events: none; }

        /* ── Card ── */
        .card { background: #fff; border: 0.5px solid #C4A8A4; border-radius: 12px; overflow: hidden; margin-bottom: 14px; }
        .card-head {
            display: flex; align-items: center; justify-content: space-between;
            padding: 11px 18px; border-bottom: 0.5px solid #EDD6D4; background: #FEF8F7;
        }
        .card-label { display: flex; align-items: center; gap: 7px; font-size: 11px; font-weight: 500; color: #72243E; letter-spacing: 0.04em; text-transform: uppercase; }

        /* ── Badges ── */
        .badge { display: inline-flex; align-items: center; font-size: 10px; padding: 2px 9px; border-radius: 99px; font-weight: 600; white-space: nowrap; }
        .badge-count  { background: #4B1528; color: #F4C0D1; }
        .badge-staff  { background: #E6F1FB; color: #185FA5; font-family: monospace; }
        .badge-kin-id { background: #F1EFE8; color: #5F5E5A; font-family: monospace; }

        /* relationship badges */
        .rel-spouse  { background: #FBEAF0; color: #72243E; }
        .rel-parent  { background: #EAF3DE; color: #27500A; }
        .rel-sibling { background: #FAEEDA; color: #633806; }
        .rel-child   { background: #E6F1FB; color: #185FA5; }
        .rel-other   { background: #F1EFE8; color: #5F5E5A; }

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
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { background: #FDF5F3; }

        /* staff cell */
        .staff-cell { display: flex; align-items: center; gap: 7px; }
        .staff-av {
            width: 26px; height: 26px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1);
            color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 8px; font-weight: 700; flex-shrink: 0;
            border: 1.5px solid #fff;
            box-shadow: 0 0 0 1px #E8D0CE;
        }
        .staff-name { font-size: 10px; color: #999; margin-top: 1px; }

        .null-val { color: #B4B2A9; font-style: italic; }
        .mono { font-family: 'Courier New', monospace; font-size: 11px; color: #712B13; }

        .addr { font-size: 11px; color: #555; max-width: 220px; white-space: normal; line-height: 1.4; }

        /* ── Action buttons ── */
        .actions { display: flex; gap: 4px; }
        .act-btn {
            background: none; border: none; cursor: pointer;
            padding: 5px 7px; border-radius: 6px; font-size: 13px;
            color: #993556; transition: background .12s;
            display: inline-flex; align-items: center;
            text-decoration: none;
        }
        .act-btn:hover { background: #FBEAF0; }
        .act-btn.del:hover { background: #FCEBEB; color: #A32D2D; }

        /* empty */
        .empty-cell { text-align: center; padding: 36px !important; color: #993556; font-size: 12px; opacity: .6; font-style: italic; }

        /* ── Confirm bar ── */
        .confirm-bar {
            display: flex; align-items: flex-start; gap: 9px;
            background: #EAF3DE; border-radius: 8px;
            padding: 10px 14px; margin-bottom: 14px;
            font-size: 11px; color: #27500A; line-height: 1.6;
        }
        .confirm-bar i { font-size: 15px; flex-shrink: 0; margin-top: 1px; }

        /* ── Back link ── */
        .back-link {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; color: #993556; text-decoration: none; padding: 4px 0;
        }
        .back-link:hover { color: #4B1528; }
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
                <div class="dh-logo-sub">Next of Kin</div>
            </div>
        </div>
        <div class="hero-actions">
            <select class="sel-hero" id="relFilter">
                <option value="">All relationships</option>
                <option value="Wife">Wife</option>
                <option value="Husband">Husband</option>
                <option value="Father">Father</option>
                <option value="Mother">Mother</option>
                <option value="Brother">Brother</option>
                <option value="Sister">Sister</option>
                <option value="Son">Son</option>
                <option value="Daughter">Daughter</option>
            </select>
            <a href="{{ route('next-of-kin.create') }}" class="btn-add">
                <i class="ti ti-plus" style="font-size:13px;"></i> Add next of kin
            </a>
        </div>
    </div>

    <div class="dh-page-title">All Next of Kin</div>
    <div class="dh-page-sub">
        <i class="ti ti-heart" style="font-size:13px;"></i>
        Emergency contacts &amp; family records for all staff
    </div>

    <div class="info-bar">
        <i class="ti ti-info-circle"></i>
        <span>
            Each staff has a unique next-of-kin record — enforced by <code>UNIQUE(staff_id)</code>.
            Deleting a staff member will <code>CASCADE</code>-delete their next-of-kin entry automatically.
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
    @if(session('error'))
    <div class="flash-err">
        <i class="ti ti-alert-triangle" style="font-size:14px;flex-shrink:0;margin-top:2px;"></i>
        {{ session('error') }}
    </div>
    @endif

    {{-- Stats --}}
    <div class="dh-stats-row">
        <div class="dh-stat">
            <div class="dh-stat-icon pink"><i class="ti ti-heart"></i></div>
            <div>
                <div class="dh-stat-val">{{ count($nextOfKin) }}</div>
                <div class="dh-stat-lbl">Total Records</div>
            </div>
        </div>
        <div class="dh-stat">
            <div class="dh-stat-icon rose"><i class="ti ti-rings-wedding"></i></div>
            <div>
                <div class="dh-stat-val">{{ collect($nextOfKin)->whereIn('relationship',['Wife','Husband'])->count() }}</div>
                <div class="dh-stat-lbl">Spouses</div>
            </div>
        </div>
        <div class="dh-stat">
            <div class="dh-stat-icon green"><i class="ti ti-users"></i></div>
            <div>
                <div class="dh-stat-val">{{ collect($nextOfKin)->whereIn('relationship',['Father','Mother'])->count() }}</div>
                <div class="dh-stat-lbl">Parents</div>
            </div>
        </div>
        <div class="dh-stat">
            <div class="dh-stat-icon blue"><i class="ti ti-phone"></i></div>
            <div>
                <div class="dh-stat-val">{{ collect($nextOfKin)->whereNotNull('telephone')->count() }}</div>
                <div class="dh-stat-lbl">With Contact</div>
            </div>
        </div>
    </div>

    {{-- Search --}}
    <div class="search-row">
        <div class="search-wrap">
            <i class="ti ti-search search-icon"></i>
            <input class="search-input" type="text" placeholder="Search name, staff ID, relationship, address…" id="searchInput" oninput="searchTable(this.value)">
        </div>
    </div>

    {{-- Table card --}}
    <div class="card">
        <div class="card-head">
            <div class="card-label">
                <i class="ti ti-table" style="font-size:14px;"></i>
                next_of_kin table
            </div>
            <span class="badge badge-count" id="rec-count">{{ count($nextOfKin) }} records</span>
        </div>
        <div class="tbl-wrap">
            <table id="nokTable">
                <thead>
                    <tr>
                        <th>Kin ID</th>
                        <th>Staff</th>
                        <th>Full Name</th>
                        <th>Relationship</th>
                        <th>Address</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($nextOfKin as $kin)
                    <tr data-rel="{{ $kin->relationship }}">

                        {{-- KIN_ID --}}
                        <td><span class="badge badge-kin-id">{{ $kin->kin_id }}</span></td>

                        {{-- STAFF_ID --}}
                        <td>
                            <div class="staff-cell">
                                @if($kin->staff)
                                    <div class="staff-av">
                                        {{ strtoupper(substr($kin->staff->first_name,0,1).substr($kin->staff->last_name,0,1)) }}
                                    </div>
                                @else
                                    <div class="staff-av">?</div>
                                @endif
                                <div>
                                    <span class="badge badge-staff">{{ $kin->staff_id }}</span>
                                    @if($kin->staff)
                                        <div class="staff-name">{{ $kin->staff->first_name }} {{ $kin->staff->last_name }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>

                        {{-- FULL NAME --}}
                        <td style="font-weight:500;">{{ $kin->full_name }}</td>

                        {{-- RELATIONSHIP --}}
                        <td>
                            @php
                                $rel = $kin->relationship;
                                $cls = match(true) {
                                    in_array($rel, ['Wife','Husband'])   => 'rel-spouse',
                                    in_array($rel, ['Father','Mother'])  => 'rel-parent',
                                    in_array($rel, ['Brother','Sister']) => 'rel-sibling',
                                    in_array($rel, ['Son','Daughter'])   => 'rel-child',
                                    default                              => 'rel-other',
                                };
                            @endphp
                            <span class="badge {{ $cls }}">{{ $rel }}</span>
                        </td>

                        {{-- ADDRESS --}}
                        <td><div class="addr">{{ $kin->address ?? '—' }}</div></td>

                        {{-- TELEPHONE --}}
                        <td>
                            @if($kin->telephone)
                                <span class="mono">{{ $kin->telephone }}</span>
                            @else
                                <span class="null-val">NULL</span>
                            @endif
                        </td>

                        {{-- ACTIONS --}}
                        <td>
                            <div class="actions">
                                <a href="{{ route('next-of-kin.edit', $kin->kin_id) }}" class="act-btn" title="Edit">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('next-of-kin.destroy', $kin->kin_id) }}"
                                      onsubmit="return confirm('Remove next of kin for {{ addslashes($kin->full_name) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="act-btn del" title="Delete">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="empty-cell">
                            <i class="ti ti-heart-off" style="font-size:28px;display:block;margin-bottom:8px;opacity:0.4;"></i>
                            No next-of-kin records found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="confirm-bar">
        <i class="ti ti-circle-check"></i>
        <span>
            <strong>UNIQUE(staff_id)</strong> confirmed: each staff member has at most one next-of-kin entry.
            Cascade delete is active — removing a staff member will automatically remove their next-of-kin record.
        </span>
    </div>

    <a href="{{ route('dashboard') }}" class="back-link">
        <i class="ti ti-arrow-left" style="font-size:14px;"></i> Back to dashboard
    </a>

</div>{{-- /dh-body --}}

<script>
document.getElementById('relFilter').addEventListener('change', function () {
    applyFilters();
});

function searchTable(query) {
    applyFilters();
}

function applyFilters() {
    var rel = document.getElementById('relFilter').value.toLowerCase();
    var q   = document.getElementById('searchInput').value.toLowerCase().trim();
    var rows = document.querySelectorAll('#nokTable tbody tr');
    var count = 0;

    rows.forEach(function(row) {
        var relMatch  = !rel || (row.dataset.rel || '').toLowerCase() === rel;
        var textMatch = !q   || row.textContent.toLowerCase().includes(q);
        var show = relMatch && textMatch;
        row.style.display = show ? '' : 'none';
        if (show) count++;
    });

    document.getElementById('rec-count').textContent = count + ' record' + (count !== 1 ? 's' : '');
}
</script>

</body>
</html>