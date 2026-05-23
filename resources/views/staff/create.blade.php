<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — Add Staff</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', system-ui, sans-serif;
            background: #FDF5F3;
            color: #3d2030;
            min-height: 100vh;
            display: grid;
            grid-template-columns: 280px 1fr;
        }

        /* ── Left Panel ── */
        .side-panel {
            background: linear-gradient(160deg, #4B1528 0%, #72243E 55%, #993556 100%);
            min-height: 100vh;
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }
        .side-panel::before {
            content: '';
            position: fixed;
            bottom: -80px; left: 100px;
            width: 260px; height: 260px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
            pointer-events: none;
        }

        .side-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 40px; }
        .side-logo-icon {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
        }
        .side-logo-text {
            font-family: 'DM Serif Display', serif;
            font-size: 18px; color: #fff; letter-spacing: -0.3px;
        }
        .side-logo-sub {
            font-size: 10px; color: rgba(255,255,255,0.5);
            text-transform: uppercase; letter-spacing: 0.08em;
        }

        .side-heading {
            font-family: 'DM Serif Display', serif;
            font-size: 22px; color: #fff;
            font-weight: 400; letter-spacing: -0.3px;
            line-height: 1.3; margin-bottom: 8px;
        }
        .side-sub {
            font-size: 11px; color: rgba(255,255,255,0.55);
            line-height: 1.65; margin-bottom: 28px;
        }

        /* field guide */
        .field-guide { list-style: none; display: flex; flex-direction: column; gap: 9px; flex: 1; }
        .fg-item { display: flex; align-items: flex-start; gap: 9px; font-size: 11px; color: rgba(255,255,255,0.6); line-height: 1.5; }
        .fg-icon {
            width: 22px; height: 22px; border-radius: 6px;
            background: rgba(255,255,255,0.12);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; flex-shrink: 0; color: #F4C0D1;
        }
        .fg-label { font-size: 10px; font-weight: 500; color: #F4C0D1; letter-spacing: 0.04em; display: block; margin-bottom: 1px; }

        /* trigger chips in sidebar */
        .trg-list { display: flex; flex-direction: column; gap: 6px; margin-top: 20px; }
        .trg-item {
            display: flex; align-items: flex-start; gap: 8px;
            background: rgba(255,255,255,0.08);
            border: 0.5px solid rgba(255,255,255,0.15);
            border-radius: 7px; padding: 8px 10px;
            font-size: 10px; color: rgba(255,255,255,0.65); line-height: 1.5;
        }
        .trg-chip {
            background: #F4C0D1; color: #4B1528;
            font-size: 8px; font-weight: 700;
            padding: 1px 6px; border-radius: 99px;
            white-space: nowrap; flex-shrink: 0;
            margin-top: 1px;
        }
        .trg-chip.new {
            background: #C0E8F4; color: #124B5A;
        }

        .side-back {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 11px; color: rgba(255,255,255,0.45);
            text-decoration: none; margin-top: 24px;
            transition: color 0.15s;
        }
        .side-back:hover { color: rgba(255,255,255,0.85); }

        /* ── Right Form Area ── */
        .form-area {
            padding: 36px 44px 44px;
            overflow-y: auto;
        }

        .flash-ok  { display:flex;align-items:flex-start;gap:8px;background:#EAF3DE;border-radius:8px;padding:9px 14px;margin-bottom:16px;font-size:12px;color:#27500A; }
        .flash-err { display:flex;align-items:flex-start;gap:8px;background:#FCEBEB;border-radius:8px;padding:9px 14px;margin-bottom:16px;font-size:12px;color:#A32D2D; }

        .form-eyebrow {
            font-size: 10px; font-weight: 600; color: #993556;
            text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 5px;
        }
        .form-title {
            font-family: 'DM Serif Display', serif;
            font-size: 24px; color: #4B1528;
            font-weight: 400; letter-spacing: -0.3px;
            margin-bottom: 24px;
        }

        /* alert */
        .alert-err {
            display: flex; align-items: flex-start; gap: 8px;
            background: #FCEBEB; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 16px;
            font-size: 12px; color: #A32D2D; line-height: 1.6;
        }
        .alert-err i { font-size: 14px; flex-shrink: 0; margin-top: 2px; }
        .alert-err ul { margin: 0; padding-left: 16px; }

        /* section divider */
        .section-label {
            font-size: 9px; font-weight: 700; color: #993556;
            text-transform: uppercase; letter-spacing: 0.1em;
            padding-bottom: 8px;
            border-bottom: 0.5px solid #EDD6D4;
            margin-bottom: 14px; margin-top: 24px;
        }
        .section-label:first-of-type { margin-top: 0; }

        /* subtype section — highlighted box */
        .subtype-section {
            display: none;
            background: rgba(114,36,62,0.04);
            border: 0.5px solid #D4A8B4;
            border-radius: 10px;
            padding: 16px 18px 6px;
            margin-bottom: 14px;
            margin-top: 4px;
        }
        .subtype-section.visible { display: block; }
        .subtype-header {
            display: flex; align-items: center; gap: 7px;
            font-size: 10px; font-weight: 700; color: #72243E;
            text-transform: uppercase; letter-spacing: 0.09em;
            margin-bottom: 12px;
        }
        .subtype-badge {
            background: #72243E; color: #fff;
            font-size: 8px; font-weight: 700;
            padding: 1px 7px; border-radius: 99px;
            text-transform: uppercase; letter-spacing: 0.05em;
        }
        .subtype-hint {
            font-size: 11px; color: #72243E; opacity: 0.75;
            margin-bottom: 12px; line-height: 1.55;
            padding: 6px 10px; background: rgba(114,36,62,0.06);
            border-radius: 6px;
        }

        /* form grid */
        .form-row  { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px; }
        .form-full { margin-bottom: 14px; }

        /* field */
        .field { display: flex; flex-direction: column; gap: 4px; }
        .field label {
            font-size: 10px; font-weight: 600;
            color: #72243E; text-transform: uppercase; letter-spacing: 0.07em;
        }
        .req { color: #A32D2D; }
        .opt { font-weight: 400; color: #B4B2A9; text-transform: none; letter-spacing: 0; }

        .inp, .form-sel {
            width: 100%; padding: 9px 11px;
            border: 0.5px solid #C4A8A4; border-radius: 8px;
            font-size: 12px; font-family: 'DM Sans', sans-serif;
            background: #fff; color: #3d2030; outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .inp:focus, .form-sel:focus {
            border-color: #72243E;
            box-shadow: 0 0 0 3px rgba(114,36,62,0.08);
        }
        .inp.has-err, .form-sel.has-err { border-color: #A32D2D; }
        .form-sel.warn { border-color: #f0c040; background: #FFFDF0; }
        textarea.inp { resize: vertical; min-height: 70px; }

        .field-hint { font-size: 10px; margin-top: 3px; line-height: 1.45; padding: 3px 7px; border-radius: 5px; }
        .hint-neutral { color: #aaa; }
        .hint-ok      { color: #27500A; background: #EAF3DE; }
        .hint-warn    { color: #854F0B; background: #FFF3CD; }

        .trig-warn {
            display: none; flex-direction: column; gap: 4px;
            background: #FFF3CD; border: 0.5px solid #f0c040;
            border-radius: 7px; padding: 9px 12px; margin-top: 6px;
            font-size: 11px; color: #854F0B; line-height: 1.5;
        }
        .trig-warn.show { display: flex; }
        .trig-warn-header { display: flex; align-items: center; gap: 6px; font-weight: 700; }

        /* actions */
        .form-actions {
            display: flex; align-items: center; gap: 12px;
            margin-top: 28px; padding-top: 20px;
            border-top: 0.5px solid #EDD6D4;
        }
        .btn-save {
            display: inline-flex; align-items: center; gap: 7px;
            background: #72243E; color: #FBEAF0;
            border: none; border-radius: 8px;
            padding: 10px 20px; font-size: 13px; font-weight: 500;
            font-family: 'DM Sans', sans-serif; cursor: pointer;
            transition: background 0.15s;
        }
        .btn-save:hover { background: #4B1528; }
        .btn-cancel {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; color: #993556; text-decoration: none;
            transition: color 0.15s;
        }
        .btn-cancel:hover { color: #4B1528; }
    </style>
</head>
<body>

{{-- ── Left Panel ── --}}
<aside class="side-panel">
    <div class="side-logo">
        <div class="side-logo-icon">
            <i class="ti ti-home-2" style="font-size:17px;color:#fff;"></i>
        </div>
        <div>
            <div class="side-logo-text">DreamHome</div>
            <div class="side-logo-sub">Staff Registry</div>
        </div>
    </div>

    <div class="side-heading">Register a new staff member</div>
    <p class="side-sub">
        Staff is inserted into <strong style="color:#F4C0D1">Staff</strong> first,
        then the matching subtype table
        (<strong style="color:#F4C0D1">Manager</strong>,
        <strong style="color:#F4C0D1">Supervisor</strong>, or
        <strong style="color:#F4C0D1">Secretary</strong>)
        is populated automatically.
    </p>

    <ul class="field-guide">
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-hash"></i></div>
            <div>
                <span class="fg-label">Identity</span>
                Unique staff_id and branch assignment.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-briefcase"></i></div>
            <div>
                <span class="fg-label">Position</span>
                Determines which subtype section appears below.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-sitemap"></i></div>
            <div>
                <span class="fg-label">Hierarchy</span>
                Only supervisor_no lives on Staff. manager_no is on the Supervisor subtype.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-map-pin"></i></div>
            <div>
                <span class="fg-label">Address</span>
                street, city, postcode — as stored in Staff table.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-user"></i></div>
            <div>
                <span class="fg-label">Personal</span>
                Sex, DOB, telephone, date joined, salary, NIN.
            </div>
        </li>
    </ul>

    <div class="trg-list">
        <div class="trg-item">
            <span class="trg-chip">T1</span>
            Staff/Secretary → supervisor_no required. Manager/Supervisor → supervisor_no must be NULL.
        </div>
        <div class="trg-item">
            <span class="trg-chip">T2</span>
            supervisor_no must reference a staff member with position = 'Supervisor'.
        </div>
        <div class="trg-item">
            <span class="trg-chip">T3</span>
            Supervisor must be in the same branch as the staff member.
        </div>
        <div class="trg-item">
            <span class="trg-chip">T4</span>
            Only one Manager allowed per branch.
        </div>
        <div class="trg-item">
            <span class="trg-chip">T5</span>
            Supervisor group size must be between 5 and 10 staff.
        </div>
        <div class="trg-item">
            <span class="trg-chip new">T6</span>
            On Supervisor subtype: manager_no must reference a Manager in the same branch. <em>(New trigger)</em>
        </div>
    </div>

    <a href="{{ route('staff.index') }}" class="side-back">
        <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back to staff list
    </a>
</aside>

{{-- ── Right Form Area ── --}}
<main class="form-area">

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

    <div class="form-eyebrow">staff + subtype — new record</div>
    <h1 class="form-title">Add Staff Member</h1>

    @if($errors->any())
    <div class="alert-err">
        <i class="ti ti-alert-triangle"></i>
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('staff.store') }}">
        @csrf

        {{-- ── Identity ── --}}
        <div class="section-label">Identity</div>
        <div class="form-row">
            <div class="field">
                <label>staff_id <span class="req">*</span></label>
                <input class="inp {{ $errors->has('staff_id') ? 'has-err' : '' }}"
                       name="staff_id" placeholder="e.g. ST071"
                       value="{{ old('staff_id') }}" required>
                <div class="field-hint hint-neutral">Unique across ALL branches</div>
            </div>
            <div class="field">
                <label>branch_no <span class="req">*</span></label>
                <select class="form-sel {{ $errors->has('branch_no') ? 'has-err' : '' }}"
                        name="branch_no" id="sel-branch" required onchange="onChange()">
                    <option value="">Select branch</option>
                    @foreach($branches as $b)
                        <option value="{{ $b->branch_no }}"
                            {{ old('branch_no') == $b->branch_no ? 'selected' : '' }}>
                            {{ $b->branch_no }} — {{ $b->city }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- ── Name ── --}}
        <div class="section-label">Name</div>
        <div class="form-row">
            <div class="field">
                <label>first_name <span class="req">*</span></label>
                <input class="inp {{ $errors->has('first_name') ? 'has-err' : '' }}"
                       name="first_name" placeholder="First name"
                       value="{{ old('first_name') }}" required>
            </div>
            <div class="field">
                <label>last_name <span class="req">*</span></label>
                <input class="inp {{ $errors->has('last_name') ? 'has-err' : '' }}"
                       name="last_name" placeholder="Last name"
                       value="{{ old('last_name') }}" required>
            </div>
        </div>

        {{-- ── Position ── --}}
        <div class="section-label">Position</div>
        <div class="form-full field">
            <label>position <span class="req">*</span></label>
            <select class="form-sel {{ $errors->has('position') ? 'has-err' : '' }}"
                    name="position" id="sel-position" required onchange="onChange()">
                <option value="">Select position</option>
                <option value="Manager"    {{ old('position') == 'Manager'    ? 'selected' : '' }}>Manager</option>
                <option value="Supervisor" {{ old('position') == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="Secretary"  {{ old('position') == 'Secretary'  ? 'selected' : '' }}>Secretary</option>
                <option value="Staff"      {{ old('position') == 'Staff'      ? 'selected' : '' }}>Staff</option>
            </select>
            <div class="field-hint hint-neutral" id="hint-position">Choose a position to see which fields are required.</div>
        </div>

        {{-- ── Hierarchy (supervisor_no only — manager_no is on Supervisor subtype) ── --}}
        <div class="section-label">Hierarchy</div>
        <div class="form-full field">
            <label>
                supervisor_no
                <span id="sup-star" style="color:#A32D2D;display:none"> *</span>
                <span id="sup-null-badge" style="font-size:9px;color:#bbb;font-weight:400;margin-left:4px;text-transform:none;letter-spacing:0;"></span>
            </label>
            <select class="form-sel" name="supervisor_no" id="sel-supervisor" onchange="checkWarnings()">
                <option value="">— NULL —</option>
                @foreach($supervisorsWithSlots as $sup)
                    <option value="{{ $sup->staff_id }}"
                        data-branch="{{ $sup->branch_no }}"
                        {{ old('supervisor_no') == $sup->staff_id ? 'selected' : '' }}>
                        {{ $sup->staff_id }} — {{ $sup->first_name }} {{ $sup->last_name }}
                        ({{ $sup->branch_no }}, {{ $sup->subordinates_count }}/10)
                    </option>
                @endforeach
            </select>
            <div class="field-hint hint-neutral" id="hint-sup">Select a position first.</div>

            {{-- T1 warning: Manager/Supervisor must not have supervisor_no --}}
            <div class="trig-warn" id="warn-sup-t1">
                <div class="trig-warn-header"><i class="ti ti-alert-triangle" style="font-size:13px"></i> Trigger T1 will fire</div>
                <span>A <strong>Manager</strong> or <strong>Supervisor</strong> cannot have a supervisor_no — keep it NULL.</span>
            </div>
            {{-- T3 warning: different branch --}}
            <div class="trig-warn" id="warn-sup-t3" style="margin-top:4px">
                <div class="trig-warn-header"><i class="ti ti-alert-triangle" style="font-size:13px"></i> Trigger T3 will fire</div>
                <span>Selected supervisor is in a <strong>different branch</strong>. They must share the same branch_no.</span>
            </div>
            {{-- T5 warning: supervisor at capacity --}}
            <div class="trig-warn" id="warn-sup-t5" style="margin-top:4px">
                <div class="trig-warn-header"><i class="ti ti-alert-triangle" style="font-size:13px"></i> Trigger T5 will fire</div>
                <span>Selected supervisor already has <strong>10 subordinates</strong> (the maximum). Choose another supervisor.</span>
            </div>
        </div>

        {{-- ════════════════════════════════════════════
             SUBTYPE SECTIONS — shown based on position
             ════════════════════════════════════════════ --}}

        {{-- ── Manager Subtype ── --}}
        <div class="subtype-section" id="subtype-manager">
            <div class="subtype-header">
                <i class="ti ti-crown" style="font-size:14px;"></i>
                Manager Details
                <span class="subtype-badge">Manager table</span>
            </div>
            <p class="subtype-hint">
                These fields are inserted into the <strong>Manager</strong> subtype table after Staff is saved.
                One manager is allowed per branch (Trigger T4).
            </p>
            <div class="form-row">
                <div class="field">
                    <label>date_start <span class="req">*</span></label>
                    <input class="inp {{ $errors->has('date_start') ? 'has-err' : '' }}"
                           type="date" name="date_start"
                           value="{{ old('date_start') }}">
                    <div class="field-hint hint-neutral">Date the manager assumed this role</div>
                </div>
                <div class="field">
                    <label>car_allowance <span class="req">*</span></label>
                    <input class="inp {{ $errors->has('car_allowance') ? 'has-err' : '' }}"
                           type="number" step="0.01" min="0"
                           name="car_allowance" placeholder="e.g. 5000.00"
                           value="{{ old('car_allowance') }}">
                    <div class="field-hint hint-neutral">Must be ≥ 0</div>
                </div>
            </div>
            <div class="form-row">
                <div class="field">
                    <label>bonus_payment <span class="req">*</span></label>
                    <input class="inp {{ $errors->has('bonus_payment') ? 'has-err' : '' }}"
                           type="number" step="0.01" min="0"
                           name="bonus_payment" placeholder="e.g. 800.00"
                           value="{{ old('bonus_payment') }}">
                    <div class="field-hint hint-neutral">Monthly bonus — must be ≥ 0</div>
                </div>
                <div class="field">
                    {{-- spacer --}}
                </div>
            </div>
        </div>

        {{-- ── Supervisor Subtype ── --}}
        <div class="subtype-section" id="subtype-supervisor">
            <div class="subtype-header">
                <i class="ti ti-sitemap" style="font-size:14px;"></i>
                Supervisor Details
                <span class="subtype-badge">Supervisor table</span>
            </div>
            <p class="subtype-hint">
                <strong>manager_no</strong> now lives here — in the <strong>Supervisor</strong> subtype table, not on Staff.
                Trigger T6 checks that the selected manager is in the same branch as this supervisor.
            </p>
            <div class="form-full field">
                <label>
                    manager_no <span class="req">*</span>
                    <span id="mgr-null-badge" style="font-size:9px;color:#bbb;font-weight:400;margin-left:4px;text-transform:none;letter-spacing:0;"></span>
                </label>
                <select class="form-sel {{ $errors->has('manager_no') ? 'has-err' : '' }}"
                        name="manager_no" id="sel-manager" onchange="checkWarnings()">
                    <option value="">— select manager —</option>
                    @foreach($managers as $mgr)
                        <option value="{{ $mgr->staff_id }}"
                            data-branch="{{ $mgr->branch_no }}"
                            {{ old('manager_no') == $mgr->staff_id ? 'selected' : '' }}>
                            {{ $mgr->staff_id }} — {{ $mgr->first_name }} {{ $mgr->last_name }}
                            ({{ $mgr->branch_no }})
                        </option>
                    @endforeach
                </select>
                <div class="field-hint hint-neutral" id="hint-mgr">Pick the manager this supervisor will report to.</div>
                {{-- T6 warning: manager in different branch --}}
                <div class="trig-warn" id="warn-mgr-t6" style="margin-top:6px">
                    <div class="trig-warn-header"><i class="ti ti-alert-triangle" style="font-size:13px"></i> Trigger T6 will fire</div>
                    <span>Selected manager is in a <strong>different branch</strong>. Trigger T6 requires the manager to share the same branch as this supervisor.</span>
                </div>
            </div>
            <div class="form-full field" style="margin-bottom:14px">
                <label>responsibility <span class="opt">(optional)</span></label>
                <textarea class="inp" name="responsibility"
                          placeholder="e.g. Oversees property registrations and client intake for this branch">{{ old('responsibility') }}</textarea>
            </div>
        </div>

        {{-- ── Secretary Subtype ── --}}
        <div class="subtype-section" id="subtype-secretary">
            <div class="subtype-header">
                <i class="ti ti-keyboard" style="font-size:14px;"></i>
                Secretary Details
                <span class="subtype-badge">Secretary table</span>
            </div>
            <p class="subtype-hint">
                These fields are inserted into the <strong>Secretary</strong> subtype table after Staff is saved.
            </p>
            <div class="form-row">
                <div class="field">
                    <label>typing_speed <span class="req">*</span></label>
                    <input class="inp {{ $errors->has('typing_speed') ? 'has-err' : '' }}"
                           type="number" min="1"
                           name="typing_speed" placeholder="e.g. 65"
                           value="{{ old('typing_speed') }}">
                    <div class="field-hint hint-neutral">Words per minute — must be &gt; 0</div>
                </div>
                <div class="field">
                    {{-- spacer --}}
                </div>
            </div>
        </div>

        {{-- ── Address ── --}}
        <div class="section-label">Address</div>
        <div class="form-row">
            <div class="field">
                <label>street <span class="req">*</span></label>
                <input class="inp {{ $errors->has('street') ? 'has-err' : '' }}"
                       name="street" placeholder="Street address"
                       value="{{ old('street') }}" required>
            </div>
            <div class="field">
                <label>city <span class="req">*</span></label>
                <input class="inp {{ $errors->has('city') ? 'has-err' : '' }}"
                       name="city" placeholder="City"
                       value="{{ old('city') }}" required>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label>postcode <span class="opt">(optional)</span></label>
                <input class="inp" name="postcode" placeholder="e.g. 9000"
                       value="{{ old('postcode') }}">
            </div>
            <div class="field">
                {{-- spacer --}}
            </div>
        </div>

        {{-- ── Personal ── --}}
        <div class="section-label">Personal</div>
        <div class="form-row">
            <div class="field">
                <label>sex <span class="opt">(optional)</span></label>
                <select class="form-sel" name="sex">
                    <option value="">Select</option>
                    <option value="M" {{ old('sex') == 'M' ? 'selected' : '' }}>Male</option>
                    <option value="F" {{ old('sex') == 'F' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="field">
                <label>telephone <span class="opt">(optional)</span></label>
                <input class="inp" name="telephone" placeholder="Phone number"
                       value="{{ old('telephone') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label>date of birth <span class="req">*</span></label>
                <input class="inp {{ $errors->has('dob') ? 'has-err' : '' }}"
                       type="date" name="dob"
                       value="{{ old('dob') }}" required>
                <div class="field-hint hint-neutral">Must be in the past (chk_dob_past)</div>
            </div>
            <div class="field">
                <label>date joined <span class="req">*</span></label>
                <input class="inp {{ $errors->has('date_joined') ? 'has-err' : '' }}"
                       type="date" name="date_joined"
                       value="{{ old('date_joined') }}" required>
                <div class="field-hint hint-neutral">Must be ≤ today (chk_date_joined)</div>
            </div>
        </div>
        <div class="form-row">
            <div class="field">
                <label>salary <span class="req">*</span></label>
                <input class="inp {{ $errors->has('salary') ? 'has-err' : '' }}"
                       type="number" step="0.01" name="salary"
                       placeholder="e.g. 25000" value="{{ old('salary') }}" required>
                <div class="field-hint hint-neutral">Must be &gt; 0 (chk_salary_positive)</div>
            </div>
            <div class="field">
                <label>NIN <span class="req">*</span></label>
                <input class="inp {{ $errors->has('nin') ? 'has-err' : '' }}"
                       name="nin" placeholder="e.g. NIN-S-011"
                       value="{{ old('nin') }}" required>
                <div class="field-hint hint-neutral">National Insurance Number — must be unique</div>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">
                <i class="ti ti-device-floppy" style="font-size:15px;"></i> Save staff member
            </button>
            <a href="{{ route('staff.index') }}" class="btn-cancel">
                <i class="ti ti-x" style="font-size:13px;"></i> Cancel
            </a>
        </div>
    </form>
</main>

<script>
// ── Helpers ──────────────────────────────────────────────────────────────────
function show(id, v) { var el = document.getElementById(id); if(el) el.classList[v ? 'add' : 'remove']('show'); }
function warn(id, v) { var el = document.getElementById(id); if(el) el.classList[v ? 'add' : 'remove']('warn'); }
function vis(id, v)  { var el = document.getElementById(id); if(el) el.classList[v ? 'add' : 'remove']('visible'); }

function onChange() {
    updatePositionHint();
    updateSubtypeSections();
    updateHierarchyHints();
    checkWarnings();
}

// ── Position hint ─────────────────────────────────────────────────────────────
function updatePositionHint() {
    var pos = document.getElementById('sel-position').value;
    var h   = document.getElementById('hint-position');
    var msgs = {
        'Manager':    'Supervisor_no = NULL. Extra fields: date_start, car_allowance, bonus_payment.',
        'Supervisor': 'Supervisor_no = NULL. Extra fields: manager_no (same-branch Manager), responsibility.',
        'Secretary':  'Supervisor_no required (same-branch Supervisor). Extra field: typing_speed.',
        'Staff':      'Supervisor_no required (same-branch Supervisor). No subtype table.',
    };
    if (pos && msgs[pos]) {
        h.textContent  = msgs[pos];
        h.className    = 'field-hint hint-ok';
    } else {
        h.textContent  = 'Choose a position to see which fields are required.';
        h.className    = 'field-hint hint-neutral';
    }
}

// ── Show/hide subtype sections ────────────────────────────────────────────────
function updateSubtypeSections() {
    var pos = document.getElementById('sel-position').value;
    vis('subtype-manager',    pos === 'Manager');
    vis('subtype-supervisor', pos === 'Supervisor');
    vis('subtype-secretary',  pos === 'Secretary');

    // Manage required attributes dynamically
    setSubtypeRequired('Manager',    pos === 'Manager');
    setSubtypeRequired('Supervisor', pos === 'Supervisor');
    setSubtypeRequired('Secretary',  pos === 'Secretary');
}

function setSubtypeRequired(type, active) {
    var fields = {
        'Manager':    ['date_start', 'car_allowance', 'bonus_payment'],
        'Supervisor': ['manager_no'],
        'Secretary':  ['typing_speed'],
    };
    if (!fields[type]) return;
    fields[type].forEach(function(name) {
        var el = document.querySelector('[name="' + name + '"]');
        if (el) el.required = active;
    });
}

// ── Hierarchy hints ───────────────────────────────────────────────────────────
function updateHierarchyHints() {
    var pos = document.getElementById('sel-position').value;
    var hS  = document.getElementById('hint-sup');
    var sS  = document.getElementById('sup-star');
    var nS  = document.getElementById('sup-null-badge');

    hS.className = 'field-hint hint-neutral';
    sS.style.display = 'none';
    nS.textContent   = '';

    if (!pos) {
        hS.textContent = 'Select a position first.';
        return;
    }

    if (pos === 'Manager' || pos === 'Supervisor') {
        hS.textContent = 'T1: ' + pos + 's must have NULL here — do not select a supervisor.';
        hS.className   = 'field-hint hint-warn';
        nS.textContent = '(must be NULL)';
    } else {
        // Staff or Secretary
        hS.textContent = 'T1: ' + pos + ' must have a supervisor_no from the same branch.';
        hS.className   = 'field-hint hint-ok';
        sS.style.display = 'inline';
    }
}

// ── Live trigger warnings ────────────────────────────────────────────────────
function checkWarnings() {
    var pos    = document.getElementById('sel-position').value;
    var branch = document.getElementById('sel-branch').value;

    var supSel    = document.getElementById('sel-supervisor');
    var supVal    = supSel.value;
    var supBranch = supVal ? supSel.options[supSel.selectedIndex].dataset.branch : '';
    // Check if supervisor is at capacity (label contains /10 at the end)
    var supAtMax  = false;
    if (supVal) {
        var supText = supSel.options[supSel.selectedIndex].text;
        var match   = supText.match(/(\d+)\/10\)/);
        if (match && parseInt(match[1]) >= 10) supAtMax = true;
    }

    // T1: Manager/Supervisor must not pick a supervisor
    var t1sup = supVal && pos && (pos === 'Manager' || pos === 'Supervisor');
    show('warn-sup-t1', t1sup);
    warn('sel-supervisor', t1sup);

    // T3: Supervisor branch mismatch
    var t3sup = supVal && branch && supBranch && supBranch !== branch;
    show('warn-sup-t3', t3sup);

    // T5: Supervisor at max capacity
    show('warn-sup-t5', supAtMax && supVal);

    // T6: Manager branch mismatch (on Supervisor subtype)
    var mgrSel    = document.getElementById('sel-manager');
    var mgrVal    = mgrSel ? mgrSel.value : '';
    var mgrBranch = mgrVal ? mgrSel.options[mgrSel.selectedIndex].dataset.branch : '';
    var t6mgr     = mgrVal && branch && mgrBranch && mgrBranch !== branch;
    show('warn-mgr-t6', t6mgr);
    if (mgrSel) warn('sel-manager', t6mgr);

    // Manager hint update
    var hM = document.getElementById('hint-mgr');
    if (hM) {
        if (mgrVal && !t6mgr) {
            hM.textContent = 'T6: Manager is in the same branch — good.';
            hM.className   = 'field-hint hint-ok';
        } else if (t6mgr) {
            hM.textContent = 'T6: Branch mismatch — select a manager from the same branch.';
            hM.className   = 'field-hint hint-warn';
        } else {
            hM.textContent = 'Pick the manager this supervisor will report to.';
            hM.className   = 'field-hint hint-neutral';
        }
    }
}

// ── Boot ──────────────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('sel-position').value) onChange();
});
</script>

</body>
</html>