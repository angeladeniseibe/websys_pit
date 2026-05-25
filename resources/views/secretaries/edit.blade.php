<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DreamHome — Edit Secretary</title>
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
            display: flex; align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 18px;
            position: relative; z-index: 1;
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
            font-size: 20px; color: #fff; letter-spacing: -0.3px;
        }
        .dh-logo-sub {
            font-size: 11px; color: rgba(255,255,255,0.55);
            letter-spacing: 0.08em; text-transform: uppercase; margin-top: 1px;
        }

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

        /* ── Body ── */
        .dh-body { padding: 20px 28px 40px; }

        /* ── Read-only identity card ── */
        .identity-card {
            background: #fff;
            border: 0.5px solid #E8D0CE;
            border-radius: 12px;
            padding: 14px 18px;
            display: flex; align-items: center; gap: 14px;
            margin-bottom: 20px;
        }
        .av-lg {
            width: 44px; height: 44px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1);
            color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 700; flex-shrink: 0;
            border: 2px solid #fff;
            box-shadow: 0 0 0 1.5px #E8D0CE;
        }
        .identity-info { flex: 1; min-width: 0; }
        .identity-name {
            font-size: 15px; font-weight: 500; color: #3d2030;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .identity-meta {
            display: flex; align-items: center; gap: 8px; margin-top: 4px; flex-wrap: wrap;
        }
        .staff-id {
            font-family: 'Courier New', monospace;
            font-size: 11px; font-weight: 700; color: #72243E;
            background: #FBEAF0; padding: 2px 7px; border-radius: 5px;
        }
        .badge {
            display: inline-flex; align-items: center;
            font-size: 10px; padding: 2px 9px;
            border-radius: 99px; font-weight: 600; white-space: nowrap;
        }
        .badge-branch { background: #E6F1FB; color: #185FA5; font-family: monospace; }
        .badge-ro     { background: #F3EFF8; color: #5A3A9B; }

        /* ── Form card ── */
        .form-card {
            background: #fff;
            border: 0.5px solid #C4A8A4;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 14px;
        }
        .form-card-head {
            display: flex; align-items: center; gap: 8px;
            padding: 11px 18px;
            border-bottom: 0.5px solid #EDD6D4;
            background: #FEF8F7;
            font-size: 11px; font-weight: 500; color: #72243E;
            letter-spacing: 0.04em; text-transform: uppercase;
        }
        .form-body { padding: 20px 18px; display: flex; flex-direction: column; gap: 18px; }

        /* ── Field ── */
        .field { display: flex; flex-direction: column; gap: 5px; }
        .field-label {
            font-size: 11px; font-weight: 600; color: #72243E;
            letter-spacing: 0.04em; text-transform: uppercase;
            display: flex; align-items: center; gap: 5px;
        }
        .req { color: #C0392B; font-size: 13px; line-height: 1; }

        .field-input,
        .field-select {
            width: 100%;
            background: #fff;
            border: 0.5px solid #C4A8A4;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 13px; color: #3d2030;
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
            appearance: none;
        }
        .field-input:focus,
        .field-select:focus {
            border-color: #993556;
            box-shadow: 0 0 0 3px rgba(153,53,86,0.10);
        }
        .field-input.is-error,
        .field-select.is-error { border-color: #C0392B; }

        /* custom select arrow */
        .select-wrap { position: relative; }
        .select-wrap::after {
            content: '\ea77'; /* ti-chevron-down codepoint */
            font-family: 'tabler-icons';
            position: absolute; right: 11px; top: 50%;
            transform: translateY(-50%);
            font-size: 14px; color: #993556; pointer-events: none;
        }
        .select-wrap .field-select { padding-right: 32px; }

        .field-hint {
            font-size: 11px; color: #9E7B84; line-height: 1.5;
            display: flex; align-items: flex-start; gap: 4px;
        }
        .field-hint i { font-size: 12px; flex-shrink: 0; margin-top: 1px; }

        /* read-only display field */
        .field-readonly {
            background: #FDF5F3;
            border: 0.5px solid #E8D0CE;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 13px; color: #72243E;
            font-family: 'Courier New', monospace; font-weight: 600;
            display: flex; align-items: center; gap: 8px;
        }
        .field-readonly i { font-size: 14px; color: #C4A8A4; }

        .error-msg {
            font-size: 11px; color: #C0392B;
            display: flex; align-items: center; gap: 4px;
        }
        .error-msg i { font-size: 12px; }

        /* speed preview badge */
        .speed-preview {
            display: inline-flex; align-items: center; gap: 6px;
            margin-top: 4px;
        }
        .sp-badge {
            font-size: 11px; padding: 2px 10px; border-radius: 99px; font-weight: 600;
            transition: background 0.2s, color 0.2s;
        }
        .sp-fast { background: #EAF3DE; color: #27500A; }
        .sp-slow { background: #FAEEDA; color: #633806; }
        .sp-label { font-size: 11px; color: #9E7B84; }

        /* ── Actions ── */
        .form-actions {
            display: flex; gap: 10px; align-items: center;
            padding: 14px 18px;
            border-top: 0.5px solid #EDD6D4;
            background: #FEF8F7;
        }
        .btn-save {
            display: inline-flex; align-items: center; gap: 7px;
            background: #4B1528; color: #fff;
            border: none; border-radius: 8px;
            padding: 10px 22px;
            font-size: 13px; font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-save:hover { background: #72243E; }
        .btn-cancel {
            display: inline-flex; align-items: center; gap: 6px;
            background: transparent; color: #993556;
            border: 0.5px solid #C4A8A4; border-radius: 8px;
            padding: 10px 18px;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-cancel:hover { background: #FEF8F7; }

        /* ── Back link ── */
        .back-link {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; color: rgba(255,255,255,0.65);
            text-decoration: none; padding: 4px 0;
            position: relative; z-index: 1;
            transition: color 0.15s;
        }
        .back-link:hover { color: #fff; }
    </style>
</head>
<body>

{{-- ── Hero ── --}}
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
        <a href="{{ route('secretaries.index') }}" class="back-link">
            <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back to list
        </a>
    </div>

    <div class="dh-page-title">Edit Secretary</div>
    <div class="dh-page-sub">
        <i class="ti ti-pencil" style="font-size:13px;"></i>
        Update supervisor assignment &amp; typing speed
    </div>
</div>

{{-- ── Body ── --}}
<div class="dh-body">

    {{-- Identity read-only card --}}
    <div class="identity-card">
        <div class="av-lg">
            {{ strtoupper(substr($secretary->staff->first_name ?? 'X', 0, 1) . substr($secretary->staff->last_name ?? 'X', 0, 1)) }}
        </div>
        <div class="identity-info">
            <div class="identity-name">
                {{ $secretary->staff->first_name ?? '—' }} {{ $secretary->staff->last_name ?? '' }}
            </div>
            <div class="identity-meta">
                <span class="staff-id">{{ $secretary->staff_id }}</span>
                <span class="badge badge-branch">{{ $secretary->staff->branch_no ?? '—' }}</span>
                <span class="badge badge-ro">
                    <i class="ti ti-lock" style="font-size:9px;margin-right:3px;"></i>
                    Read-only fields
                </span>
            </div>
        </div>
    </div>

    {{-- Form --}}
    <form action="{{ route('secretaries.update', $secretary->staff_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-card">
            <div class="form-card-head">
                <i class="ti ti-edit" style="font-size:14px;"></i>
                Editable fields
            </div>

            <div class="form-body">

                {{-- Staff ID (read-only display) --}}
                <div class="field">
                    <div class="field-label">
                        <i class="ti ti-id-badge" style="font-size:13px;"></i>
                        Staff ID
                    </div>
                    <div class="field-readonly">
                        <i class="ti ti-lock"></i>
                        {{ $secretary->staff_id }}
                    </div>
                    <div class="field-hint">
                        <i class="ti ti-info-circle"></i>
                        Staff ID is the primary key and cannot be changed.
                    </div>
                </div>

                {{-- Supervisor --}}
                <div class="field">
                    <label class="field-label" for="supervisor_no">
                        <i class="ti ti-user-check" style="font-size:13px;"></i>
                        Supervisor <span class="req">*</span>
                    </label>
                    <div class="select-wrap">
                        <select
                            id="supervisor_no"
                            name="supervisor_no"
                            class="field-select @error('supervisor_no') is-error @enderror"
                        >
                            <option value="" disabled>— Select a supervisor —</option>
                            @foreach($supervisors as $sup)
                                <option
                                    value="{{ $sup->staff_id }}"
                                    {{ old('supervisor_no', $secretary->supervisor_no) == $sup->staff_id ? 'selected' : '' }}
                                >
                                    {{ $sup->staff->first_name ?? '' }} {{ $sup->staff->last_name ?? '' }}
                                    ({{ $sup->staff_id }}) — Branch {{ $sup->staff->branch_no ?? '—' }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('supervisor_no')
                        <div class="error-msg">
                            <i class="ti ti-alert-circle"></i> {{ $message }}
                        </div>
                    @enderror
                    <div class="field-hint">
                        <i class="ti ti-info-circle"></i>
                        The supervisor must be in the same branch as this secretary.
                    </div>
                </div>

                {{-- Typing Speed --}}
                <div class="field">
                    <label class="field-label" for="typing_speed">
                        <i class="ti ti-keyboard" style="font-size:13px;"></i>
                        Typing Speed (WPM) <span class="req">*</span>
                    </label>
                    <input
                        type="number"
                        id="typing_speed"
                        name="typing_speed"
                        class="field-input @error('typing_speed') is-error @enderror"
                        value="{{ old('typing_speed', $secretary->typing_speed) }}"
                        min="1" max="300"
                        placeholder="e.g. 65"
                        oninput="updateSpeedPreview(this.value)"
                    >
                    <div class="speed-preview">
                        <span class="sp-badge sp-fast" id="speedBadge">
                            {{ old('typing_speed', $secretary->typing_speed) }} wpm
                        </span>
                        <span class="sp-label" id="speedLabel">
                            {{ (old('typing_speed', $secretary->typing_speed) >= 60) ? 'Above threshold' : 'Below 60 wpm threshold' }}
                        </span>
                    </div>
                    @error('typing_speed')
                        <div class="error-msg">
                            <i class="ti ti-alert-circle"></i> {{ $message }}
                        </div>
                    @enderror
                    <div class="field-hint">
                        <i class="ti ti-info-circle"></i>
                        Must be between 1 and 300. Speeds ≥ 60 wpm are highlighted green.
                    </div>
                </div>

            </div>

            {{-- Actions --}}
            <div class="form-actions">
                <button type="submit" class="btn-save">
                    <i class="ti ti-device-floppy" style="font-size:15px;"></i>
                    Save Changes
                </button>
                <a href="{{ route('secretaries.index') }}" class="btn-cancel">
                    <i class="ti ti-x" style="font-size:13px;"></i>
                    Cancel
                </a>
            </div>
        </div>

    </form>

</div>

<script>
    function updateSpeedPreview(val) {
        const badge = document.getElementById('speedBadge');
        const label = document.getElementById('speedLabel');
        const n = parseInt(val, 10);

        if (!val || isNaN(n)) {
            badge.textContent = '— wpm';
            badge.className = 'sp-badge sp-slow';
            label.textContent = 'Enter a value';
            return;
        }

        badge.textContent = n + ' wpm';
        if (n >= 60) {
            badge.className = 'sp-badge sp-fast';
            label.textContent = 'Above threshold';
        } else {
            badge.className = 'sp-badge sp-slow';
            label.textContent = 'Below 60 wpm threshold';
        }
    }

    // Run on load to set correct state for pre-filled value
    updateSpeedPreview(document.getElementById('typing_speed').value);
</script>

</body>
</html>