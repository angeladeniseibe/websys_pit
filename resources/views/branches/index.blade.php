<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches — DreamHome</title>
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

        /* ── Hero Header ── */
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

        /* Info bar inside hero */
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

        /* trigger chip */
        .trg {
            display: inline-flex; align-items: center;
            background: #F4C0D1; color: #4B1528;
            font-size: 9px; font-weight: 700;
            padding: 1px 7px; border-radius: 99px;
            letter-spacing: 0.04em; margin: 0 3px;
        }

        /* ── Flash messages ── */
        .flash-ok {
            display: flex; align-items: flex-start; gap: 8px;
            background: #EAF3DE; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 14px;
            font-size: 12px; color: #27500A;
        }
        .flash-err {
            display: flex; align-items: flex-start; gap: 8px;
            background: #FCEBEB; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 14px;
            font-size: 12px; color: #A32D2D;
        }

        /* ── Body ── */
        .dh-body { padding: 20px 28px 28px; }

        /* ── Stats row ── */
        .dh-stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 18px;
        }
        .dh-stat {
            background: #fff;
            border: 0.5px solid #E8D0CE;
            border-radius: 10px;
            padding: 12px 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .dh-stat-icon {
            width: 32px; height: 32px;
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; flex-shrink: 0;
        }
        .dh-stat-icon.pink  { background: #FBEAF0; color: #72243E; }
        .dh-stat-icon.rose  { background: #F4C0D1; color: #4B1528; }
        .dh-stat-icon.green { background: #EAF3DE; color: #27500A; }
        .dh-stat-val {
            font-size: 20px; font-weight: 500;
            color: #4B1528; line-height: 1;
        }
        .dh-stat-lbl {
            font-size: 10px; color: #993556;
            text-transform: uppercase; letter-spacing: 0.07em; margin-top: 2px;
        }

        /* ── Search row ── */
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
        .badge-info    { background: #E6F1FB; color: #0C447C; }
        .badge-manager { background: #F4C0D1; color: #72243E; }
        .badge-ok      { background: #EAF3DE; color: #27500A; }
        .badge-count   { background: #4B1528; color: #F4C0D1; }

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

        .null-val { color: #B4B2A9; font-style: italic; }

        .av-wrap { display: flex; align-items: center; gap: 7px; }
        .av {
            width: 26px; height: 26px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1);
            color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 8px; font-weight: 700; flex-shrink: 0;
            border: 1.5px solid #fff;
            box-shadow: 0 0 0 1px #E8D0CE;
        }

        .city-name { font-weight: 500; color: #4B1528; }
        .mono { font-family: 'Courier New', monospace; font-size: 11px; color: #712B13; }

        /* ── Icon-only action buttons ── */
        .col-actions { text-align: center; width: 80px; }
        .actions-wrap { display: flex; align-items: center; justify-content: center; gap: 2px; }

        .btn-icon {
            display: inline-flex; align-items: center; justify-content: center;
            width: 30px; height: 30px;
            background: transparent;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            color: #993556;
            text-decoration: none;
            font-size: 16px;
            transition: background 0.15s, color 0.15s;
            font-family: inherit;
        }
        .btn-icon:hover       { background: #FBEAF0; color: #4B1528; }
        .btn-icon.del         { color: #993556; }
        .btn-icon.del:hover   { background: #FCEBEB; color: #A32D2D; }

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
            font-size: 12px; color: #993556;
            text-decoration: none; padding: 4px 0;
        }
        .back-link:hover { color: #4B1528; }

        /* ── Empty state ── */
        .empty-state {
            text-align: center; color: #993556; padding: 32px 24px;
        }
        .empty-state i { font-size: 32px; opacity: 0.4; display: block; margin-bottom: 8px; }
        .empty-state p { font-size: 13px; }
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
                <div class="dh-logo-sub">Branch Network</div>
            </div>
        </div>
        <a href="{{ route('branches.create') }}" class="btn-add">
            <i class="ti ti-plus" style="font-size:13px;"></i> Add branch
        </a>
    </div>

    <div class="dh-page-title">All Branches</div>
    <div class="dh-page-sub">
        <i class="ti ti-map-pin" style="font-size:13px;"></i>
        Nationwide property network · Philippines
    </div>

    <div class="info-bar">
        <i class="ti ti-info-circle"></i>
        <span>
            Each branch has a unique <code>branch_no</code>.
            Stores full address (street, area, city, postcode), telephone, and fax.
            <span class="trg">Trigger 4</span>
            enforces exactly <strong style="color:#fff;">one Manager per branch_no</strong> — a second Manager INSERT raises a PostgreSQL exception.
        </span>
    </div>
</div>

{{-- ── Body ── --}}
<div class="dh-body">

    {{-- flash messages --}}
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

    {{-- stats row --}}
    <div class="dh-stats-row">
        <div class="dh-stat">
            <div class="dh-stat-icon pink">
                <i class="ti ti-building-skyscraper"></i>
            </div>
            <div>
                <div class="dh-stat-val">{{ $branches->count() }}</div>
                <div class="dh-stat-lbl">Total Branches</div>
            </div>
        </div>
        <div class="dh-stat">
            <div class="dh-stat-icon rose">
                <i class="ti ti-users"></i>
            </div>
            <div>
                <div class="dh-stat-val">{{ $branches->filter(fn($b) => $b->manager)->count() }}</div>
                <div class="dh-stat-lbl">With Managers</div>
            </div>
        </div>
        <div class="dh-stat">
            <div class="dh-stat-icon green">
                <i class="ti ti-map-2"></i>
            </div>
            <div>
                <div class="dh-stat-val">{{ $branches->pluck('city')->unique()->count() }}</div>
                <div class="dh-stat-lbl">Cities Covered</div>
            </div>
        </div>
    </div>

    {{-- search bar --}}
    <div class="search-row">
        <div class="search-wrap">
            <i class="ti ti-search search-icon"></i>
            <input
                class="search-input"
                type="text"
                placeholder="Search branch, city, area…"
                id="searchInput"
                oninput="filterTable(this.value)"
            >
        </div>
    </div>

    {{-- table card --}}
    <div class="card">
        <div class="card-head">
            <div class="card-label">
                <i class="ti ti-table" style="font-size:14px;"></i>
                branch table
            </div>
            <span class="badge badge-count" id="recordCount">
                {{ $branches->count() }} record{{ $branches->count() !== 1 ? 's' : '' }}
            </span>
        </div>
        <div class="tbl-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Branch No</th>
                        <th>Street</th>
                        <th>Area</th>
                        <th>City</th>
                        <th>Postcode</th>
                        <th>Telephone</th>
                        <th>Fax</th>
                        <th>Manager</th>
                        <th class="col-actions">Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($branches as $branch)
                    <tr>
                        {{-- BRANCH_NO --}}
                        <td>
                            <span class="badge badge-info">{{ $branch->branch_no }}</span>
                        </td>

                        {{-- STREET --}}
                        <td>{{ $branch->street }}</td>

                        {{-- AREA --}}
                        <td>
                            @if($branch->area)
                                {{ $branch->area }}
                            @else
                                <span class="null-val">—</span>
                            @endif
                        </td>

                        {{-- CITY --}}
                        <td class="city-name">{{ $branch->city }}</td>

                        {{-- POSTCODE --}}
                        <td class="mono">{{ $branch->postcode ?? '—' }}</td>

                        {{-- TELEPHONE --}}
                        <td class="mono">{{ $branch->telephone ?? '—' }}</td>

                        {{-- FAX --}}
                        <td class="mono">{{ $branch->fax ?? '—' }}</td>

                        {{-- MANAGER --}}
                        <td>
                            @if($branch->manager)
                                <div class="av-wrap">
                                    <div class="av">
                                        {{ strtoupper(substr($branch->manager->first_name,0,1).substr($branch->manager->last_name,0,1)) }}
                                    </div>
                                    <span>{{ substr($branch->manager->first_name,0,1) }}. {{ $branch->manager->last_name }}</span>
                                </div>
                            @else
                                <span class="null-val">— no manager</span>
                            @endif
                        </td>

                        {{-- ACTIONS --}}
                        <td class="col-actions">
                            <div class="actions-wrap">
                                {{-- Edit --}}
                                <a href="{{ route('branches.edit', $branch->branch_no) }}"
                                   class="btn-icon"
                                   title="Edit {{ $branch->branch_no }}">
                                    <i class="ti ti-pencil"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('branches.destroy', $branch->branch_no) }}"
                                      method="POST"
                                      style="display:inline;margin:0;"
                                      onsubmit="return confirm('Delete branch {{ $branch->branch_no }}? This cannot be undone.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn-icon del"
                                            title="Delete {{ $branch->branch_no }}">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <i class="ti ti-building-off"></i>
                                <p>No branch records found.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- trigger 4 confirmation --}}
    <div class="confirm-bar">
        <i class="ti ti-circle-check"></i>
        <span>
            <strong>Trigger 4</strong> confirmed: each branch has at most one Manager.
            Branches with no manager show "— no manager".
            Any attempt to INSERT a second Manager to the same branch raises a PostgreSQL exception.
        </span>
    </div>

    {{-- back link --}}
    <a href="{{ route('dashboard') }}" class="back-link">
        <i class="ti ti-arrow-left" style="font-size:14px;"></i> Back to dashboard
    </a>

</div>{{-- end .dh-body --}}

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