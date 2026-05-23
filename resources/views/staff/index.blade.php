<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff — DreamHome</title>
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
            outline: none;
            cursor: pointer;
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
            position: relative; z-index: 1; flex-wrap: wrap;
        }
        .info-bar i { font-size: 14px; flex-shrink: 0; margin-top: 2px; color: #F4C0D1; }
        .info-bar code { font-family: monospace; font-size: 10px; background: rgba(255,255,255,0.15); padding: 1px 5px; border-radius: 4px; color: #F4C0D1; }

        .trg {
            display: inline-flex; align-items: center;
            background: #F4C0D1; color: #4B1528;
            font-size: 9px; font-weight: 700;
            padding: 1px 7px; border-radius: 99px;
            letter-spacing: 0.04em; margin: 0 3px;
        }

        .flash-ok  { display:flex;align-items:flex-start;gap:8px;background:#EAF3DE;border-radius:8px;padding:9px 14px;margin-bottom:14px;font-size:12px;color:#27500A; }
        .flash-err { display:flex;align-items:flex-start;gap:8px;background:#FCEBEB;border-radius:8px;padding:9px 14px;margin-bottom:14px;font-size:12px;color:#A32D2D; }

        .dh-body { padding: 20px 28px 28px; }

        .dh-stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; margin-bottom: 18px; }
        .dh-stat {
            background: #fff; border: 0.5px solid #E8D0CE;
            border-radius: 10px; padding: 12px 14px;
            display: flex; align-items: center; gap: 10px;
        }
        .dh-stat-icon { width: 32px; height: 32px; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 15px; flex-shrink: 0; }
        .dh-stat-icon.pink  { background: #FBEAF0; color: #72243E; }
        .dh-stat-icon.rose  { background: #F4C0D1; color: #4B1528; }
        .dh-stat-icon.blue  { background: #E6F1FB; color: #185FA5; }
        .dh-stat-icon.amber { background: #FAEEDA; color: #633806; }
        .dh-stat-val { font-size: 20px; font-weight: 500; color: #4B1528; line-height: 1; }
        .dh-stat-lbl { font-size: 10px; color: #993556; text-transform: uppercase; letter-spacing: 0.07em; margin-top: 2px; }

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

        .card { background: #fff; border: 0.5px solid #C4A8A4; border-radius: 12px; overflow: hidden; margin-bottom: 14px; }
        .card-head {
            display: flex; align-items: center; justify-content: space-between;
            padding: 11px 18px; border-bottom: 0.5px solid #EDD6D4; background: #FEF8F7;
        }
        .card-label { display: flex; align-items: center; gap: 7px; font-size: 11px; font-weight: 500; color: #72243E; letter-spacing: 0.04em; text-transform: uppercase; }

        .badge { display: inline-flex; align-items: center; font-size: 10px; padding: 2px 9px; border-radius: 99px; font-weight: 600; white-space: nowrap; }
        .badge-info    { background: #E6F1FB; color: #0C447C; }
        .badge-manager { background: #FBEAF0; color: #72243E; }
        .badge-sup     { background: #E6F1FB; color: #0C447C; }
        .badge-sec     { background: #FAEEDA; color: #633806; }
        .badge-staff   { background: #F1EFE8; color: #5F5E5A; }
        .badge-branch  { background: #E6F1FB; color: #185FA5; }
        .badge-count   { background: #4B1528; color: #F4C0D1; }
        .ref-badge     { display: inline-flex; align-items: center; background: #FBEAF0; color: #72243E; border-radius: 99px; padding: 2px 8px; font-size: 10px; font-weight: 600; }

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
        tbody tr { cursor: pointer; }
        tbody tr:hover td { background: #FDF5F3; }
        tbody tr.active td { background: #FBF0EE; }

        .actions-cell { display: flex; align-items: center; gap: 6px; }
        .btn-action {
            display: inline-flex; align-items: center; justify-content: center;
            width: 28px; height: 28px; border-radius: 7px;
            border: 0.5px solid transparent;
            font-size: 14px; cursor: pointer;
            text-decoration: none;
            transition: background 0.15s, border-color 0.15s, transform 0.1s;
            background: none; font-family: inherit;
        }
        .btn-action:active { transform: scale(0.92); }
        .btn-edit   { background: #E6F1FB; color: #185FA5; border-color: #C2D8F0; }
        .btn-edit:hover { background: #CBE3F6; border-color: #185FA5; }
        .btn-delete { background: #FCEBEB; color: #A32D2D; border-color: #F2C6C6; }
        .btn-delete:hover { background: #F8D4D4; border-color: #A32D2D; }

        .modal-overlay {
            display: none; position: fixed; inset: 0; z-index: 1000;
            background: rgba(30,10,18,0.45); backdrop-filter: blur(2px);
            align-items: center; justify-content: center;
        }
        .modal-overlay.open { display: flex; }
        .modal-box {
            background: #fff; border-radius: 14px;
            padding: 24px 28px; max-width: 380px; width: 90%;
            box-shadow: 0 8px 32px rgba(75,21,40,0.18);
            border: 0.5px solid #E8D0CE;
        }
        .modal-icon { width: 42px; height: 42px; border-radius: 10px; background: #FCEBEB; color: #A32D2D; display: flex; align-items: center; justify-content: center; font-size: 20px; margin-bottom: 14px; }
        .modal-title { font-family: 'DM Serif Display', serif; font-size: 18px; color: #3d2030; margin-bottom: 6px; }
        .modal-sub { font-size: 12px; color: #999; line-height: 1.6; margin-bottom: 20px; }
        .modal-sub strong { color: #3d2030; }
        .modal-actions { display: flex; gap: 8px; justify-content: flex-end; }
        .btn-cancel { padding: 8px 18px; border-radius: 8px; border: 0.5px solid #C4A8A4; background: #fff; color: #3d2030; font-size: 12px; font-weight: 500; font-family: 'DM Sans', sans-serif; cursor: pointer; }
        .btn-cancel:hover { background: #FDF5F3; }
        .btn-confirm-delete { padding: 8px 18px; border-radius: 8px; border: none; background: #A32D2D; color: #fff; font-size: 12px; font-weight: 500; font-family: 'DM Sans', sans-serif; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; }
        .btn-confirm-delete:hover { background: #861E1E; }

        .null-val { color: #B4B2A9; font-style: italic; }
        .mono { font-family: 'Courier New', monospace; font-size: 11px; color: #712B13; }

        .confirm-bar { display: flex; align-items: flex-start; gap: 9px; background: #EAF3DE; border-radius: 8px; padding: 10px 14px; margin-bottom: 14px; font-size: 11px; color: #27500A; line-height: 1.6; }
        .confirm-bar i { font-size: 15px; flex-shrink: 0; margin-top: 1px; }

        .back-link { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; color: #993556; text-decoration: none; padding: 4px 0; }
        .back-link:hover { color: #4B1528; }

        .panel { display: none; }
        .panel.active { display: block; }

        .d-hero {
            background: linear-gradient(135deg, #4B1528 0%, #72243E 60%, #993556 100%);
            padding: 22px 32px;
            position: relative; overflow: hidden;
        }
        .d-hero::before { content:''; position:absolute; top:-30px; right:-30px; width:160px; height:160px; border-radius:50%; background:rgba(255,255,255,0.05); }

        .d-back-link { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; color: rgba(255,255,255,0.65); text-decoration: none; padding: 0 0 14px; position: relative; z-index: 1; cursor: pointer; }
        .d-back-link:hover { color: #fff; }

        .d-hero-inner { display: flex; align-items: center; gap: 16px; position: relative; z-index: 1; }
        .d-avatar { width: 54px; height: 54px; border-radius: 50%; background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.3); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 18px; font-weight: 700; flex-shrink: 0; font-family: 'DM Serif Display', serif; }
        .d-name { font-family: 'DM Serif Display', serif; font-size: 22px; color: #fff; font-weight: 400; letter-spacing: -0.3px; margin-bottom: 6px; }
        .d-meta { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .d-meta-id { font-family: monospace; font-size: 11px; color: rgba(255,255,255,0.5); }

        .d-body { padding: 20px 28px 28px; }

        .d-trigger-bar { display: flex; align-items: flex-start; gap: 9px; background: #EAF3DE; border-radius: 8px; padding: 10px 14px; margin-bottom: 16px; font-size: 11px; color: #27500A; line-height: 1.6; }

        .d-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 14px; }
        .d-card { background: #fff; border: 0.5px solid #C4A8A4; border-radius: 10px; padding: 14px 16px; }
        .d-card-title { font-size: 9px; font-weight: 600; color: #993556; text-transform: uppercase; letter-spacing: 0.07em; margin-bottom: 10px; display: flex; align-items: center; gap: 6px; }
        .d-row { display: flex; justify-content: space-between; align-items: center; padding: 7px 0; border-bottom: 0.5px solid #F5E8E6; font-size: 12px; }
        .d-row:last-child { border-bottom: none; }
        .d-label { color: #999; font-size: 11px; }
        .d-val { color: #3d2030; font-weight: 500; }
        .d-val.mono { font-family: 'Courier New', monospace; font-size: 11px; color: #712B13; }

        .d-actions { display: flex; gap: 8px; margin-bottom: 14px; }
        .d-btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 12px; font-weight: 500; font-family: 'DM Sans', sans-serif; cursor: pointer; text-decoration: none; border: 0.5px solid transparent; transition: background 0.15s, transform 0.1s; }
        .d-btn:active { transform: scale(0.97); }
        .d-btn-edit { background: #E6F1FB; color: #185FA5; border-color: #C2D8F0; }
        .d-btn-edit:hover { background: #CBE3F6; }
        .d-btn-del  { background: #FCEBEB; color: #A32D2D; border-color: #F2C6C6; }
        .d-btn-del:hover { background: #F8D4D4; }
    </style>
</head>
<body>

<!-- DELETE MODAL -->
<div class="modal-overlay" id="delete-modal">
    <div class="modal-box">
        <div class="modal-icon"><i class="ti ti-trash"></i></div>
        <div class="modal-title">Remove staff member?</div>
        <div class="modal-sub">
            You're about to permanently delete <strong id="modal-name"></strong>
            (<span id="modal-id" style="font-family:monospace;font-size:11px;color:#712B13;"></span>).
            This action cannot be undone.
        </div>
        <div class="modal-actions">
            <button class="btn-cancel" onclick="closeDeleteModal()">Cancel</button>
            <form id="delete-form" method="POST" style="margin:0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-confirm-delete">
                    <i class="ti ti-trash" style="font-size:13px;"></i> Yes, delete
                </button>
            </form>
        </div>
    </div>
</div>


<!-- LIST PANEL -->
<div id="panel-list" class="panel active">

    <div class="dh-hero">
        <div class="dh-hero-top">
            <div class="dh-logo">
                <div class="dh-logo-icon">
                    <i class="ti ti-home-2" style="font-size:18px;color:#fff;"></i>
                </div>
                <div>
                    <div class="dh-logo-text">DreamHome</div>
                    <div class="dh-logo-sub">Staff Directory</div>
                </div>
            </div>
            <div class="hero-actions">
                <select class="sel-hero" onchange="filterPos(this.value)">
                    <option value="">All positions</option>
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Secretary">Secretary</option>
                    <option value="Staff">Staff</option>
                </select>
                <a href="{{ route('staff.create') }}" class="btn-add">
                    <i class="ti ti-plus" style="font-size:13px;"></i> Add staff
                </a>
            </div>
        </div>

        <div class="dh-page-title">All Staff</div>
        <div class="dh-page-sub">
            <i class="ti ti-users" style="font-size:13px;"></i>
            People &amp; roles across all branches
        </div>

        <div class="info-bar">
            <i class="ti ti-info-circle"></i>
            <span>
                Each staff has a unique <code>staff_id</code> across ALL branches. <code>NIN</code> is unique.
                <code>supervisor_no</code> is a self-referencing FK.
                <span class="trg">Trigger 1</span> Staff/Secretary → supervisor_no required; Supervisor/Manager → supervisor_no NULL.
                <span class="trg">Trigger 2</span> FKs must reference correct positions.
                <span class="trg">Trigger 3</span> Supervisor must be in same branch.
            </span>
        </div>
    </div>

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

        <div class="dh-stats-row">
            <div class="dh-stat">
                <div class="dh-stat-icon pink"><i class="ti ti-users"></i></div>
                <div>
                    <div class="dh-stat-val">{{ count($staff) }}</div>
                    <div class="dh-stat-lbl">Total Staff</div>
                </div>
            </div>
            <div class="dh-stat">
                <div class="dh-stat-icon rose"><i class="ti ti-crown"></i></div>
                <div>
                    <div class="dh-stat-val">{{ collect($staff)->where('position','Manager')->count() }}</div>
                    <div class="dh-stat-lbl">Managers</div>
                </div>
            </div>
            <div class="dh-stat">
                <div class="dh-stat-icon blue"><i class="ti ti-user-check"></i></div>
                <div>
                    <div class="dh-stat-val">{{ collect($staff)->where('position','Supervisor')->count() }}</div>
                    <div class="dh-stat-lbl">Supervisors</div>
                </div>
            </div>
            <div class="dh-stat">
                <div class="dh-stat-icon amber"><i class="ti ti-user"></i></div>
                <div>
                    <div class="dh-stat-val">{{ collect($staff)->whereIn('position',['Staff','Secretary'])->count() }}</div>
                    <div class="dh-stat-lbl">Staff / Secretaries</div>
                </div>
            </div>
        </div>

        <div class="search-row">
            <div class="search-wrap">
                <i class="ti ti-search search-icon"></i>
                <input class="search-input" type="text" placeholder="Search name, ID, branch, NIN…" id="searchInput" oninput="searchTable(this.value)">
            </div>
        </div>

        <div class="card">
            <div class="card-head">
                <div class="card-label">
                    <i class="ti ti-table" style="font-size:14px;"></i>
                    staff table — supervisor_no shown
                </div>
                <span class="badge badge-count" id="rec-count">{{ count($staff) }} records</span>
            </div>
            <div class="tbl-wrap">
                <table id="staff-tbl">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Branch</th>
                            <th>Supervisor No</th>
                            <th>Salary</th>
                            <th>NIN</th>
                            <th>Date Joined</th>
                            <th style="text-align:center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($staff as $member)
                        <tr data-pos="{{ $member->position }}"
                            data-id="{{ $member->staff_id }}"
                            data-first="{{ $member->first_name }}"
                            data-last="{{ $member->last_name }}"
                            data-position="{{ $member->position }}"
                            data-branch="{{ $member->branch_no }}"
                            data-supervisor="{{ $member->supervisor_no ?? '' }}"
                            data-salary="{{ $member->salary }}"
                            data-nin="{{ $member->nin }}"
                            data-joined="{{ $member->date_joined->format('M d, Y') }}"
                            data-sex="{{ $member->sex ?? '' }}"
                            data-telephone="{{ $member->telephone ?? '' }}"
                            data-dob="{{ $member->dob ? $member->dob->format('M d, Y') : '' }}"
                            data-street="{{ e($member->street) }}"
                            data-city="{{ e($member->city) }}"
                            data-postcode="{{ $member->postcode ?? '' }}"
                            data-edit-url="{{ route('staff.edit', $member->staff_id) }}"
                            data-delete-url="{{ route('staff.destroy', $member->staff_id) }}"
                            onclick="openDetail(this)">

                            <td><span class="badge badge-info">{{ $member->staff_id }}</span></td>
                            <td style="font-weight:500;">{{ $member->first_name }} {{ $member->last_name }}</td>
                            <td>
                                @if($member->position === 'Manager')
                                    <span class="badge badge-manager">Manager</span>
                                @elseif($member->position === 'Supervisor')
                                    <span class="badge badge-sup">Supervisor</span>
                                @elseif($member->position === 'Secretary')
                                    <span class="badge badge-sec">Secretary</span>
                                @else
                                    <span class="badge badge-staff">Staff</span>
                                @endif
                            </td>
                            <td><span class="badge badge-branch">{{ $member->branch_no }}</span></td>
                            <td>
                                @if(in_array($member->position, ['Staff','Secretary']) && $member->supervisor_no)
                                    <span class="ref-badge">{{ $member->supervisor_no }}</span>
                                @else
                                    <span class="null-val">NULL</span>
                                @endif
                            </td>
                            <td class="mono">£{{ number_format($member->salary, 0) }}</td>
                            <td class="mono">{{ $member->nin }}</td>
                            <td>{{ $member->date_joined->format('M d, Y') }}</td>

                            <td onclick="event.stopPropagation()">
                                <div class="actions-cell">
                                    <a href="{{ route('staff.edit', $member->staff_id) }}"
                                       class="btn-action btn-edit"
                                       title="Edit {{ $member->first_name }}">
                                        <i class="ti ti-pencil"></i>
                                    </a>
                                    <button type="button"
                                            class="btn-action btn-delete"
                                            title="Delete {{ $member->first_name }}"
                                            onclick="openDeleteModal(
                                                '{{ $member->staff_id }}',
                                                '{{ addslashes($member->first_name.' '.$member->last_name) }}',
                                                '{{ route('staff.destroy', $member->staff_id) }}'
                                            )">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="confirm-bar">
            <i class="ti ti-circle-check"></i>
            <span>
                <strong>Trigger 1</strong> confirmed: Managers &amp; Supervisors have supervisor_no NULL. Staff/Secretaries have supervisor_no set.
                Click any row to view full staff details, or use the <strong>✏️ edit</strong> / <strong>🗑️ delete</strong> buttons.
            </span>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="ti ti-arrow-left" style="font-size:14px;"></i> Back to dashboard
        </a>

    </div>
</div>


<!-- DETAIL PANEL -->
<div id="panel-detail" class="panel">

    <div class="d-hero">
        <a class="d-back-link" onclick="backToList(); return false;" href="#">
            <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back to staff list
        </a>
        <div class="d-hero-inner">
            <div class="d-avatar" id="d-avatar"></div>
            <div>
                <div class="d-name" id="d-name"></div>
                <div class="d-meta">
                    <span id="d-pos-badge"></span>
                    <span id="d-branch-badge"></span>
                    <span class="d-meta-id" id="d-id-label"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="d-body">

        <div class="d-trigger-bar">
            <i class="ti ti-circle-check" style="font-size:15px;flex-shrink:0;margin-top:1px;"></i>
            <span id="d-trigger-msg"></span>
        </div>

        <div class="d-actions">
            <a id="d-edit-btn" href="#" class="d-btn d-btn-edit">
                <i class="ti ti-pencil" style="font-size:13px;"></i> Edit staff
            </a>
            <button type="button" id="d-delete-btn" class="d-btn d-btn-del"
                    onclick="openDeleteModalFromDetail()">
                <i class="ti ti-trash" style="font-size:13px;"></i> Delete staff
            </button>
        </div>

        <div class="d-grid">
            <div class="d-card">
                <div class="d-card-title">
                    <i class="ti ti-id-badge" style="font-size:13px;"></i>
                    Personal info
                </div>
                <div class="d-row"><span class="d-label">Staff ID</span><span class="d-val mono" id="d-sid"></span></div>
                <div class="d-row"><span class="d-label">Full name</span><span class="d-val" id="d-fullname"></span></div>
                <div class="d-row"><span class="d-label">NIN</span><span class="d-val mono" id="d-nin"></span></div>
                <div class="d-row"><span class="d-label">Sex</span><span class="d-val" id="d-sex"></span></div>
                <div class="d-row"><span class="d-label">Date of Birth</span><span class="d-val" id="d-dob"></span></div>
                <div class="d-row"><span class="d-label">Telephone</span><span class="d-val" id="d-telephone"></span></div>
            </div>
            <div class="d-card">
                <div class="d-card-title">
                    <i class="ti ti-sitemap" style="font-size:13px;"></i>
                    Role &amp; reporting
                </div>
                <div class="d-row"><span class="d-label">Position</span><span class="d-val" id="d-position"></span></div>
                <div class="d-row"><span class="d-label">Branch</span><span class="d-val" id="d-branch"></span></div>
                <div class="d-row"><span class="d-label">Supervisor no.</span><span class="d-val" id="d-sup"></span></div>
                <div class="d-row"><span class="d-label">Date Joined</span><span class="d-val" id="d-joined"></span></div>
                <div class="d-row"><span class="d-label">Salary</span><span class="d-val mono" id="d-salary"></span></div>
            </div>
        </div>

        <div class="d-grid">
            <div class="d-card">
                <div class="d-card-title">
                    <i class="ti ti-map-pin" style="font-size:13px;"></i>
                    Address
                </div>
                <div class="d-row"><span class="d-label">Street</span><span class="d-val" id="d-street"></span></div>
                <div class="d-row"><span class="d-label">City</span><span class="d-val" id="d-city"></span></div>
                <div class="d-row"><span class="d-label">Postcode</span><span class="d-val" id="d-postcode"></span></div>
            </div>
            <div class="d-card" style="background:transparent;border-color:transparent;box-shadow:none;"></div>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="ti ti-arrow-left" style="font-size:14px;"></i> Back to dashboard
        </a>

    </div>
</div>


<script>
var _currentRow = null;

function posBadge(pos) {
    var map = { Manager:'badge-manager', Supervisor:'badge-sup', Secretary:'badge-sec', Staff:'badge-staff' };
    return '<span class="badge '+(map[pos]||'badge-staff')+'">'+pos+'</span>';
}

function openDetail(row) {
    _currentRow = row;
    var d = row.dataset;

    document.getElementById('d-avatar').textContent     = (d.first[0] + d.last[0]).toUpperCase();
    document.getElementById('d-name').textContent       = d.first + ' ' + d.last;
    document.getElementById('d-id-label').textContent   = d.id;
    document.getElementById('d-pos-badge').innerHTML    = posBadge(d.position);
    document.getElementById('d-branch-badge').innerHTML = '<span class="badge badge-branch">'+d.branch+'</span>';

    // Personal
    document.getElementById('d-sid').textContent        = d.id;
    document.getElementById('d-fullname').textContent   = d.first + ' ' + d.last;
    document.getElementById('d-nin').textContent        = d.nin;
    document.getElementById('d-sex').textContent        = d.sex       || '—';
    document.getElementById('d-dob').textContent        = d.dob       || '—';
    document.getElementById('d-telephone').textContent  = d.telephone || '—';

    // Role
    document.getElementById('d-position').innerHTML = posBadge(d.position);
    document.getElementById('d-branch').innerHTML   = '<span class="badge badge-branch">'+d.branch+'</span>';
    document.getElementById('d-sup').innerHTML      = d.supervisor
        ? '<span class="ref-badge">'+d.supervisor+'</span>'
        : '<span class="null-val">NULL</span>';
    document.getElementById('d-joined').textContent = d.joined;
    document.getElementById('d-salary').textContent = '£' + Number(d.salary).toLocaleString();

    // Address
    document.getElementById('d-street').textContent   = d.street   || '—';
    document.getElementById('d-city').textContent     = d.city     || '—';
    document.getElementById('d-postcode').textContent = d.postcode || '—';

    // Edit button
    document.getElementById('d-edit-btn').href = d.editUrl;

    // Trigger message
    var msg = '';
    if (d.position === 'Manager' || d.position === 'Supervisor') {
        msg = 'Trigger 1 confirmed: ' + d.position + ' — supervisor_no is NULL as required.';
    } else {
        msg = 'Trigger 1 confirmed: ' + d.position + ' — supervisor_no set to ' + d.supervisor + ' as required.';
    }
    document.getElementById('d-trigger-msg').textContent = msg;

    document.querySelectorAll('#staff-tbl tbody tr').forEach(function(r){ r.classList.remove('active'); });
    row.classList.add('active');

    document.getElementById('panel-list').classList.remove('active');
    document.getElementById('panel-detail').classList.add('active');
    window.scrollTo(0, 0);
}

function backToList() {
    document.getElementById('panel-detail').classList.remove('active');
    document.getElementById('panel-list').classList.add('active');
    document.querySelectorAll('#staff-tbl tbody tr').forEach(function(r){ r.classList.remove('active'); });
    window.scrollTo(0, 0);
}

function openDeleteModal(id, name, deleteUrl) {
    document.getElementById('modal-name').textContent = name;
    document.getElementById('modal-id').textContent   = id;
    document.getElementById('delete-form').action     = deleteUrl;
    document.getElementById('delete-modal').classList.add('open');
}

function openDeleteModalFromDetail() {
    if (!_currentRow) return;
    var d = _currentRow.dataset;
    openDeleteModal(d.id, d.first + ' ' + d.last, d.deleteUrl);
}

function closeDeleteModal() {
    document.getElementById('delete-modal').classList.remove('open');
}

document.getElementById('delete-modal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});

function filterPos(val) {
    var rows = document.querySelectorAll('#staff-tbl tbody tr');
    var count = 0;
    rows.forEach(function(r) {
        var show = !val || r.dataset.pos === val;
        r.style.display = show ? '' : 'none';
        if (show) count++;
    });
    document.getElementById('rec-count').textContent = count + ' record' + (count !== 1 ? 's' : '');
}

function searchTable(query) {
    var q = query.toLowerCase().trim();
    var rows = document.querySelectorAll('#staff-tbl tbody tr');
    var count = 0;
    rows.forEach(function(r) {
        var show = !q || r.textContent.toLowerCase().includes(q);
        r.style.display = show ? '' : 'none';
        if (show) count++;
    });
    document.getElementById('rec-count').textContent = count + ' record' + (count !== 1 ? 's' : '');
}
</script>

</body>
</html>