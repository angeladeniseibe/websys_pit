<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff — DreamHome</title>
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
            padding: 28px 32px 24px;
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
            justify-content: space-between; margin-bottom: 20px;
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

        .btn-back {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.85);
            border: 1px solid rgba(255,255,255,0.22);
            border-radius: 8px;
            padding: 8px 14px;
            font-size: 12px; font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            transition: background 0.2s;
            position: relative; z-index: 1;
        }
        .btn-back:hover { background: rgba(255,255,255,0.22); color: #fff; }

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

        .steps-row {
            display: flex; align-items: center; gap: 0;
            margin-top: 20px; position: relative; z-index: 1;
        }
        .step-pill {
            display: flex; align-items: center; gap: 7px;
            padding: 6px 14px 6px 12px;
            font-size: 11px; font-weight: 500; color: rgba(255,255,255,0.5);
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 99px;
            margin-right: 8px;
            transition: all 0.2s;
            cursor: pointer;
        }
        .step-pill.active {
            color: #fff;
            background: rgba(255,255,255,0.18);
            border-color: rgba(255,255,255,0.35);
        }
        .step-pill.done {
            color: #A8DBA0;
            background: rgba(100,200,90,0.1);
            border-color: rgba(100,200,90,0.25);
        }
        .step-num {
            width: 18px; height: 18px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 9px; font-weight: 700;
            background: rgba(255,255,255,0.15);
        }
        .step-pill.active .step-num { background: rgba(255,255,255,0.3); }
        .step-pill.done  .step-num  { background: rgba(100,200,90,0.3); }

        .dh-body { padding: 24px 32px 40px; max-width: 820px; margin: 0 auto; }

        .flash-err {
            display: flex; align-items: flex-start; gap: 8px;
            background: #FCEBEB; border-radius: 10px;
            padding: 12px 16px; margin-bottom: 18px;
            font-size: 12px; color: #A32D2D;
            border: 0.5px solid #F2C6C6;
        }
        .flash-err ul { margin: 4px 0 0 14px; }
        .flash-err li { margin-top: 3px; }

        .form-section {
            background: #fff;
            border: 0.5px solid #C4A8A4;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 14px;
            display: none;
        }
        .form-section.active { display: block; }

        .section-head {
            display: flex; align-items: center; gap: 10px;
            padding: 13px 20px;
            border-bottom: 0.5px solid #EDD6D4;
            background: #FEF8F7;
        }
        .section-head-icon {
            width: 28px; height: 28px; border-radius: 7px;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; flex-shrink: 0;
        }
        .section-head-icon.rose  { background: #FBEAF0; color: #72243E; }
        .section-head-icon.blue  { background: #E6F1FB; color: #185FA5; }
        .section-head-icon.amber { background: #FAEEDA; color: #633806; }
        .section-head-title {
            font-size: 11px; font-weight: 600; color: #72243E;
            text-transform: uppercase; letter-spacing: 0.06em;
        }
        .section-head-sub { font-size: 11px; color: #B8908A; margin-left: auto; }

        .section-body { padding: 18px 20px; }

        .field-grid   { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .field-full   { grid-column: 1 / -1; }

        .field { display: flex; flex-direction: column; gap: 5px; }
        .field label {
            font-size: 10px; font-weight: 600; color: #72243E;
            text-transform: uppercase; letter-spacing: 0.07em;
            display: flex; align-items: center; gap: 5px;
        }
        .field label .req { color: #993556; font-size: 12px; line-height: 1; }
        .field label .opt {
            font-size: 9px; font-weight: 500; color: #B8908A;
            background: #F5EBE8; border-radius: 99px;
            padding: 1px 7px; letter-spacing: 0.04em;
            text-transform: none;
        }

        .field input,
        .field select,
        .field textarea {
            background: #FFFBFA;
            border: 0.5px solid #C4A8A4;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 12px; color: #3d2030;
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
            width: 100%;
        }
        .field input:focus,
        .field select:focus { border-color: #993556; box-shadow: 0 0 0 3px rgba(153,53,86,0.08); }
        .field input.has-error,
        .field select.has-error { border-color: #E05555; box-shadow: 0 0 0 3px rgba(224,85,85,0.08); }
        .field input::placeholder { color: #C4B0AE; }

        /* Read-only staff_id styling */
        .field input[readonly] {
            background: #F5EBE8;
            color: #993556;
            cursor: not-allowed;
            border-color: #E0C8C4;
        }

        .field select {
            cursor: pointer; appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23993556' stroke-width='2.5'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat; background-position: right 10px center; padding-right: 30px;
        }

        .field-hint  { font-size: 10px; color: #B8908A; line-height: 1.4; }
        .field-error { font-size: 10px; color: #C0392B; display: flex; align-items: center; gap: 4px; }

        input.mono-input {
            font-family: 'Courier New', monospace;
            font-size: 12px; color: #712B13;
            letter-spacing: 0.03em;
        }

        .cond-field {
            padding: 12px 14px;
            background: #FEF8F7;
            border: 0.5px solid #EDD6D4;
            border-radius: 8px;
            display: none;
        }
        .cond-field.visible { display: block; }
        .cond-label {
            font-size: 10px; font-weight: 600; color: #72243E;
            text-transform: uppercase; letter-spacing: 0.07em;
            margin-bottom: 7px; display: flex; align-items: center; gap: 6px;
        }
        .cond-label i { font-size: 12px; }

        .preview-row {
            display: flex; align-items: center; gap: 14px;
            padding: 14px 16px;
            background: linear-gradient(135deg, #4B1528 0%, #72243E 60%, #993556 100%);
            border-radius: 10px;
            margin-bottom: 16px;
        }
        .preview-avatar {
            width: 46px; height: 46px; border-radius: 50%;
            background: rgba(255,255,255,0.2);
            border: 2px solid rgba(255,255,255,0.3);
            color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; font-weight: 700;
            font-family: 'DM Serif Display', serif;
            flex-shrink: 0;
        }
        .preview-name  { font-family: 'DM Serif Display', serif; font-size: 17px; color: #fff; letter-spacing: -0.2px; }
        .preview-meta  { display: flex; align-items: center; gap: 7px; margin-top: 4px; flex-wrap: wrap; }
        .preview-badge { font-size: 10px; padding: 2px 9px; border-radius: 99px; font-weight: 600; }
        .pbadge-manager    { background: #F4C0D1; color: #4B1528; }
        .pbadge-supervisor { background: rgba(255,255,255,0.2); color: #fff; border: 1px solid rgba(255,255,255,0.3); }
        .pbadge-secretary  { background: #FAEEDA; color: #633806; }
        .pbadge-staff      { background: rgba(255,255,255,0.12); color: rgba(255,255,255,0.7); border: 1px solid rgba(255,255,255,0.2); }
        .preview-id { font-family: monospace; font-size: 11px; color: rgba(255,255,255,0.45); }

        .trigger-note {
            display: flex; align-items: flex-start; gap: 8px;
            background: #FEF8F7; border: 0.5px solid #EDD6D4;
            border-radius: 8px; padding: 10px 14px;
            font-size: 11px; color: #72243E; line-height: 1.6;
            margin-bottom: 14px;
        }
        .trigger-note i { font-size: 14px; flex-shrink: 0; margin-top: 1px; color: #993556; }
        .trg {
            display: inline-flex; align-items: center;
            background: #F4C0D1; color: #4B1528;
            font-size: 9px; font-weight: 700;
            padding: 1px 7px; border-radius: 99px;
            letter-spacing: 0.04em; margin: 0 2px;
        }

        .nav-row {
            display: flex; align-items: center; justify-content: space-between;
            margin-top: 6px;
        }
        .btn-nav {
            display: inline-flex; align-items: center; gap: 7px;
            padding: 9px 20px; border-radius: 8px;
            font-size: 12px; font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer; border: none;
            transition: background 0.15s, transform 0.1s;
        }
        .btn-nav:active { transform: scale(0.97); }
        .btn-prev { background: #fff; color: #993556; border: 0.5px solid #C4A8A4 !important; }
        .btn-prev:hover { background: #FDF5F3; }
        .btn-next { background: linear-gradient(135deg, #72243E, #993556); color: #fff; }
        .btn-next:hover { background: linear-gradient(135deg, #5A1B30, #7E2848); }
        .btn-submit { background: linear-gradient(135deg, #4B1528, #72243E); color: #fff; }
        .btn-submit:hover { background: linear-gradient(135deg, #38101E, #5A1B30); }

        .progress-wrap {
            background: rgba(255,255,255,0.12);
            border-radius: 99px; height: 3px;
            margin-top: 16px; position: relative; z-index: 1; overflow: hidden;
        }
        .progress-fill {
            height: 100%; border-radius: 99px;
            background: rgba(255,255,255,0.7);
            transition: width 0.35s ease;
        }

        .readonly-badge {
            display: inline-flex; align-items: center; gap: 4px;
            font-size: 9px; font-weight: 600; color: #993556;
            background: #FBEAF0; border-radius: 99px;
            padding: 1px 8px; text-transform: uppercase; letter-spacing: 0.05em;
        }
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
                <div class="dh-logo-sub">Staff Directory</div>
            </div>
        </div>
        <a href="{{ route('staff.index') }}" class="btn-back">
            <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back to staff
        </a>
    </div>

    <div class="dh-page-title">Edit Staff Member</div>
    <div class="dh-page-sub">
        <i class="ti ti-pencil" style="font-size:13px;"></i>
        Editing — <strong style="color:#F4C0D1;">{{ $staff->staff_id }}</strong>
        &nbsp;·&nbsp; {{ $staff->first_name }} {{ $staff->last_name }}
    </div>

    <div class="steps-row">
        <div class="step-pill active" id="pill-1" onclick="goToStep(1)">
            <span class="step-num">1</span> Identity
        </div>
        <div class="step-pill" id="pill-2" onclick="goToStep(2)">
            <span class="step-num">2</span> Role &amp; Branch
        </div>
        <div class="step-pill" id="pill-3" onclick="goToStep(3)">
            <span class="step-num">3</span> Contact &amp; Dates
        </div>
    </div>

    <div class="progress-wrap">
        <div class="progress-fill" id="progress-fill" style="width:33%;"></div>
    </div>
</div>


<div class="dh-body">

    @if($errors->any())
    <div class="flash-err">
        <i class="ti ti-alert-triangle" style="font-size:15px;flex-shrink:0;margin-top:2px;"></i>
        <div>
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    {{-- IMPORTANT: PUT method for update + correct route --}}
    <form method="POST" action="{{ route('staff.update', $staff->staff_id) }}" id="staff-form" novalidate>
        @csrf
        @method('PUT')

        <!-- Live Preview -->
        <div class="preview-row">
            <div class="preview-avatar" id="prev-avatar">
                {{ strtoupper(substr($staff->first_name,0,1).substr($staff->last_name,0,1)) }}
            </div>
            <div>
                <div class="preview-name" id="prev-name">{{ $staff->first_name }} {{ $staff->last_name }}</div>
                <div class="preview-meta">
                    <span class="preview-badge pbadge-{{ strtolower($staff->position) }}" id="prev-pos-badge">
                        {{ $staff->position }}
                    </span>
                    <span class="preview-id" id="prev-id">ID: {{ $staff->staff_id }}</span>
                </div>
            </div>
        </div>

        <!-- STEP 1 — Identity -->
        <div class="form-section active" id="step-1">
            <div class="section-head">
                <div class="section-head-icon rose"><i class="ti ti-id-badge"></i></div>
                <div><div class="section-head-title">Step 1 — Personal Identity</div></div>
                <span class="section-head-sub">1 of 3</span>
            </div>
            <div class="section-body">
                <div class="field-grid" style="margin-bottom:14px;">

                    <!-- Staff ID — READ ONLY -->
                    <div class="field">
                        <label>
                            Staff ID
                            <span class="readonly-badge"><i class="ti ti-lock" style="font-size:9px;"></i> Read-only</span>
                        </label>
                        <input type="text"
                               class="mono-input"
                               value="{{ $staff->staff_id }}"
                               readonly>
                        <span class="field-hint">Primary key — cannot be changed after creation.</span>
                    </div>

                    <!-- NIN -->
                    <div class="field">
                        <label>NIN <span class="req">*</span></label>
                        <input type="text" name="nin" id="nin"
                               class="mono-input {{ $errors->has('nin') ? 'has-error' : '' }}"
                               value="{{ old('nin', $staff->nin) }}"
                               placeholder="e.g. AB123456C"
                               maxlength="20">
                        <span class="field-hint">National Insurance Number — must be unique.</span>
                        @error('nin')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- First Name -->
                    <div class="field">
                        <label>First Name <span class="req">*</span></label>
                        <input type="text" name="first_name" id="first_name"
                               class="{{ $errors->has('first_name') ? 'has-error' : '' }}"
                               value="{{ old('first_name', $staff->first_name) }}"
                               placeholder="e.g. Jane"
                               maxlength="50"
                               oninput="updatePreviewName()">
                        @error('first_name')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="field">
                        <label>Last Name <span class="req">*</span></label>
                        <input type="text" name="last_name" id="last_name"
                               class="{{ $errors->has('last_name') ? 'has-error' : '' }}"
                               value="{{ old('last_name', $staff->last_name) }}"
                               placeholder="e.g. Smith"
                               maxlength="50"
                               oninput="updatePreviewName()">
                        @error('last_name')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Sex -->
                    <div class="field">
                        <label>Sex <span class="opt">optional</span></label>
                        <select name="sex" class="{{ $errors->has('sex') ? 'has-error' : '' }}">
                            <option value="">— Select —</option>
                            <option value="M" {{ old('sex', $staff->sex) === 'M' ? 'selected' : '' }}>Male</option>
                            <option value="F" {{ old('sex', $staff->sex) === 'F' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('sex')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date of Birth -->
                    <div class="field">
                        <label>Date of Birth <span class="req">*</span></label>
                        <input type="date" name="dob"
                               class="{{ $errors->has('dob') ? 'has-error' : '' }}"
                               value="{{ old('dob', $staff->dob?->format('Y-m-d')) }}">
                        @error('dob')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="nav-row">
                    <span></span>
                    <button type="button" class="btn-nav btn-next" onclick="goToStep(2)">
                        Next: Role &amp; Branch <i class="ti ti-arrow-right" style="font-size:13px;"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- STEP 2 — Role & Branch -->
        <div class="form-section" id="step-2">
            <div class="section-head">
                <div class="section-head-icon blue"><i class="ti ti-sitemap"></i></div>
                <div><div class="section-head-title">Step 2 — Role &amp; Branch</div></div>
                <span class="section-head-sub">2 of 3</span>
            </div>
            <div class="section-body">

                <div class="trigger-note">
                    <i class="ti ti-info-circle"></i>
                    <span>
                        <span class="trg">Trigger 1</span> <strong>Manager</strong> &amp; <strong>Supervisor</strong> → supervisor_no must be NULL.
                        <strong>Staff</strong> &amp; <strong>Secretary</strong> → supervisor_no is required.
                        <span class="trg">Trigger 3</span> Supervisor must belong to the same branch.
                    </span>
                </div>

                <div class="field-grid" style="margin-bottom:14px;">

                    <!-- Position -->
                    <div class="field">
                        <label>Position <span class="req">*</span></label>
                        <select name="position" id="position"
                                class="{{ $errors->has('position') ? 'has-error' : '' }}"
                                onchange="onPositionChange(this.value)">
                            <option value="">— Select position —</option>
                            <option value="Manager"    {{ old('position', $staff->position) === 'Manager'    ? 'selected' : '' }}>Manager</option>
                            <option value="Supervisor" {{ old('position', $staff->position) === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                            <option value="Secretary"  {{ old('position', $staff->position) === 'Secretary'  ? 'selected' : '' }}>Secretary</option>
                            <option value="Staff"      {{ old('position', $staff->position) === 'Staff'      ? 'selected' : '' }}>Staff</option>
                        </select>
                        @error('position')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Branch -->
                    <div class="field">
                        <label>Branch <span class="req">*</span></label>
                        <select name="branch_no" id="branch_no"
                                class="{{ $errors->has('branch_no') ? 'has-error' : '' }}">
                            <option value="">— Select branch —</option>
                            @foreach($branches as $branch)
                                <option value="{{ $branch->branch_no }}"
                                    {{ old('branch_no', $staff->branch_no) == $branch->branch_no ? 'selected' : '' }}>
                                    {{ $branch->branch_no }}
                                    @if($branch->city) — {{ $branch->city }}@endif
                                </option>
                            @endforeach
                        </select>
                        @error('branch_no')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div class="field">
                        <label>Salary (£) <span class="req">*</span></label>
                        <input type="number" name="salary" id="salary"
                               class="mono-input {{ $errors->has('salary') ? 'has-error' : '' }}"
                               value="{{ old('salary', $staff->salary) }}"
                               placeholder="e.g. 35000"
                               min="0" step="500">
                        @error('salary')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <!-- Conditional: supervisor_no -->
                <div class="cond-field" id="supervisor-field">
                    <div class="cond-label">
                        <i class="ti ti-user-check"></i>
                        Supervisor No <span style="color:#993556;font-size:12px;">*</span>
                        <span style="font-size:9px;font-weight:500;color:#B8908A;text-transform:none;background:#F5EBE8;border-radius:99px;padding:1px 7px;letter-spacing:0.04em;">required for Staff &amp; Secretary</span>
                    </div>
                    <div class="field">
                        <select name="supervisor_no" id="supervisor_no"
                                class="{{ $errors->has('supervisor_no') ? 'has-error' : '' }}">
                            <option value="">— Select supervisor —</option>
                            @foreach($supervisorsWithSlots as $sup)
                                <option value="{{ $sup->staff_id }}"
                                    {{ old('supervisor_no', $staff->supervisor_no) == $sup->staff_id ? 'selected' : '' }}>
                                    {{ $sup->staff_id }} — {{ $sup->first_name }} {{ $sup->last_name }}
                                    ({{ $sup->branch_no }})
                                </option>
                            @endforeach
                        </select>
                        <span class="field-hint" style="margin-top:4px;">
                            <i class="ti ti-alert-circle" style="font-size:11px;color:#993556;vertical-align:middle;"></i>
                            Trigger 3: supervisor must be in the same branch as this staff member.
                        </span>
                        @error('supervisor_no')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="nav-row" style="margin-top:14px;">
                    <button type="button" class="btn-nav btn-prev" onclick="goToStep(1)">
                        <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back
                    </button>
                    <button type="button" class="btn-nav btn-next" onclick="goToStep(3)">
                        Next: Contact &amp; Dates <i class="ti ti-arrow-right" style="font-size:13px;"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- STEP 3 — Contact & Dates -->
        <div class="form-section" id="step-3">
            <div class="section-head">
                <div class="section-head-icon amber"><i class="ti ti-map-pin"></i></div>
                <div><div class="section-head-title">Step 3 — Contact &amp; Dates</div></div>
                <span class="section-head-sub">3 of 3</span>
            </div>
            <div class="section-body">

                <div class="field-grid" style="margin-bottom:14px;">

                    <!-- Street -->
                    <div class="field field-full">
                        <label>Street Address <span class="req">*</span></label>
                        <input type="text" name="street"
                               class="{{ $errors->has('street') ? 'has-error' : '' }}"
                               value="{{ old('street', $staff->street) }}"
                               placeholder="e.g. 12 Oak Lane"
                               maxlength="100">
                        @error('street')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- City -->
                    <div class="field">
                        <label>City <span class="req">*</span></label>
                        <input type="text" name="city"
                               class="{{ $errors->has('city') ? 'has-error' : '' }}"
                               value="{{ old('city', $staff->city) }}"
                               placeholder="e.g. London"
                               maxlength="50">
                        @error('city')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Postcode -->
                    <div class="field">
                        <label>Postcode <span class="opt">optional</span></label>
                        <input type="text" name="postcode"
                               class="mono-input {{ $errors->has('postcode') ? 'has-error' : '' }}"
                               value="{{ old('postcode', $staff->postcode) }}"
                               placeholder="e.g. SW1A 1AA"
                               maxlength="20">
                        @error('postcode')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Telephone -->
                    <div class="field">
                        <label>Telephone <span class="opt">optional</span></label>
                        <input type="text" name="telephone"
                               class="mono-input {{ $errors->has('telephone') ? 'has-error' : '' }}"
                               value="{{ old('telephone', $staff->telephone) }}"
                               placeholder="e.g. 07700 900000"
                               maxlength="20">
                        @error('telephone')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Date Joined -->
                    <div class="field">
                        <label>Date Joined <span class="req">*</span></label>
                        <input type="date" name="date_joined"
                               class="{{ $errors->has('date_joined') ? 'has-error' : '' }}"
                               value="{{ old('date_joined', $staff->date_joined?->format('Y-m-d')) }}">
                        @error('date_joined')
                            <span class="field-error"><i class="ti ti-alert-circle" style="font-size:11px;"></i> {{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="nav-row">
                    <button type="button" class="btn-nav btn-prev" onclick="goToStep(2)">
                        <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back
                    </button>
                    <button type="submit" class="btn-nav btn-submit">
                        <i class="ti ti-device-floppy" style="font-size:13px;"></i> Update Staff Member
                    </button>
                </div>

            </div>
        </div>

    </form>
</div>


<script>
var currentStep = 1;
var totalSteps  = 3;

// Jump to step with errors on validation fail
(function () {
    var hasStep1 = {{ $errors->hasAny(['nin','first_name','last_name','sex','dob']) ? 'true' : 'false' }};
    var hasStep2 = {{ $errors->hasAny(['position','branch_no','salary','supervisor_no']) ? 'true' : 'false' }};
    var hasStep3 = {{ $errors->hasAny(['street','city','postcode','telephone','date_joined']) ? 'true' : 'false' }};

    if (hasStep3)      goToStep(3);
    else if (hasStep2) goToStep(2);
    else if (hasStep1) goToStep(1);
})();

function goToStep(n) {
    for (var i = 1; i <= totalSteps; i++) {
        document.getElementById('step-'+i).classList.toggle('active', i === n);
    }
    for (var i = 1; i <= totalSteps; i++) {
        var pill = document.getElementById('pill-'+i);
        pill.classList.remove('active','done');
        if (i < n)   pill.classList.add('done');
        if (i === n) pill.classList.add('active');
    }
    document.getElementById('progress-fill').style.width = ((n / totalSteps) * 100) + '%';
    currentStep = n;
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function onPositionChange(pos) {
    var supField = document.getElementById('supervisor-field');
    var supSel   = document.getElementById('supervisor_no');

    if (pos === 'Staff' || pos === 'Secretary') {
        supField.classList.add('visible');
        supSel.required = true;
    } else {
        supField.classList.remove('visible');
        supSel.required = false;
        supSel.value = '';
    }

    var badge    = document.getElementById('prev-pos-badge');
    var classMap = {
        'Manager':    'pbadge-manager',
        'Supervisor': 'pbadge-supervisor',
        'Secretary':  'pbadge-secretary',
        'Staff':      'pbadge-staff'
    };
    badge.className   = 'preview-badge ' + (classMap[pos] || 'pbadge-staff');
    badge.textContent = pos || 'Position';
}

function updatePreviewName() {
    var first = (document.getElementById('first_name').value || '').trim();
    var last  = (document.getElementById('last_name').value  || '').trim();
    document.getElementById('prev-name').textContent    = [first, last].filter(Boolean).join(' ') || 'Staff Member';
    document.getElementById('prev-avatar').textContent  = ((first[0]||'')+(last[0]||'')).toUpperCase() || '?';
}

// Boot — initialize position visibility and preview from existing staff data
(function () {
    var pos = document.getElementById('position').value;
    if (pos) onPositionChange(pos);
    updatePreviewName();
})();
</script>

</body>
</html>