<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supervisor — DreamHome</title>
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
        .back-link {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; color: rgba(255,255,255,0.65);
            text-decoration: none; position: relative; z-index: 1;
        }
        .back-link:hover { color: #fff; }

        .dh-body { padding: 20px 28px 40px; max-width: 640px; }

        .flash-err {
            display: flex; align-items: flex-start; gap: 8px;
            background: #FCEBEB; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 14px;
            font-size: 12px; color: #A32D2D;
        }

        .form-card {
            background: #fff;
            border: 0.5px solid #C4A8A4;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 14px;
        }
        .form-card-head {
            display: flex; align-items: center; gap: 8px;
            padding: 12px 18px;
            border-bottom: 0.5px solid #EDD6D4;
            background: #FEF8F7;
            font-size: 11px; font-weight: 500;
            color: #72243E;
            letter-spacing: 0.04em; text-transform: uppercase;
        }
        .form-card-body { padding: 18px; }

        .staff-strip {
            display: flex; align-items: center; gap: 10px;
            background: #FEF8F7;
            border: 0.5px solid #EDD6D4;
            border-radius: 8px;
            padding: 10px 14px;
        }
        .av {
            width: 32px; height: 32px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1);
            color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 10px; font-weight: 700; flex-shrink: 0;
            border: 1.5px solid #fff;
            box-shadow: 0 0 0 1px #E8D0CE;
        }
        .staff-name { font-size: 13px; font-weight: 500; color: #4B1528; }
        .staff-meta { font-size: 10px; color: #993556; margin-top: 1px; font-family: 'Courier New', monospace; }

        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 14px;
        }
        .field-row.single { grid-template-columns: 1fr; }
        .field-row:last-child { margin-bottom: 0; }

        .field-group { display: flex; flex-direction: column; gap: 5px; }
        .field-label {
            font-size: 11px; font-weight: 500;
            color: #72243E;
            letter-spacing: 0.04em; text-transform: uppercase;
        }
        .field-required { color: #993556; margin-left: 2px; }
        .field-hint { font-size: 10px; color: #993556; margin-top: 1px; }

        .field-input,
        .field-select,
        .field-textarea {
            background: #fff;
            border: 0.5px solid #C4A8A4;
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 13px; color: #3d2030;
            font-family: 'DM Sans', sans-serif;
            outline: none;
            transition: border-color .15s;
            width: 100%;
        }
        .field-input:focus,
        .field-select:focus,
        .field-textarea:focus { border-color: #993556; }
        .field-textarea { resize: vertical; min-height: 100px; line-height: 1.5; }

        .field-error { font-size: 11px; color: #A32D2D; margin-top: 2px; }
        .field-input.is-invalid,
        .field-select.is-invalid,
        .field-textarea.is-invalid { border-color: #E24B4A; }

        /* Manager option styling */
        .manager-option {
            display: flex; align-items: center; gap: 8px;
            padding: 8px 10px;
            border: 0.5px solid #EDD6D4;
            border-radius: 8px;
            cursor: pointer;
            transition: background .15s, border-color .15s;
            margin-bottom: 6px;
        }
        .manager-option:last-child { margin-bottom: 0; }
        .manager-option input[type="radio"] { accent-color: #993556; flex-shrink: 0; }
        .manager-option:has(input:checked) {
            background: #FEF8F7; border-color: #993556;
        }
        .manager-option:hover { background: #FEF8F7; }
        .mgr-av {
            width: 26px; height: 26px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1);
            color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 8px; font-weight: 700; flex-shrink: 0;
            border: 1.5px solid #fff; box-shadow: 0 0 0 1px #E8D0CE;
        }
        .mgr-name { font-size: 12px; font-weight: 500; color: #3d2030; }
        .mgr-id   { font-size: 10px; color: #993556; font-family: 'Courier New', monospace; }

        .action-bar {
            display: flex; align-items: center; gap: 10px;
            margin-top: 4px;
        }
        .btn-save {
            display: inline-flex; align-items: center; gap: 7px;
            background: #4B1528; color: #F4C0D1;
            border: none; border-radius: 8px;
            padding: 10px 20px;
            font-size: 13px; font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer; transition: background .2s;
        }
        .btn-save:hover { background: #72243E; }
        .btn-cancel {
            display: inline-flex; align-items: center; gap: 6px;
            background: transparent; color: #993556;
            border: 0.5px solid #C4A8A4;
            border-radius: 8px; padding: 10px 18px;
            font-size: 13px; font-weight: 400;
            font-family: 'DM Sans', sans-serif;
            text-decoration: none; cursor: pointer;
            transition: background .15s;
        }
        .btn-cancel:hover { background: #FEF8F7; }

        .no-managers {
            font-size: 12px; color: #993556;
            font-style: italic; padding: 8px 0;
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
                <div class="dh-logo-sub">Supervisor Network</div>
            </div>
        </div>
        <a href="{{ route('supervisors.index') }}" class="back-link">
            <i class="ti ti-arrow-left" style="font-size:13px;"></i> All Supervisors
        </a>
    </div>

    <div class="dh-page-title">Edit Supervisor</div>
    <div class="dh-page-sub">
        <i class="ti ti-pencil" style="font-size:13px;"></i>
        Updating record for — {{ $supervisor->staff->first_name ?? '' }} {{ $supervisor->staff->last_name ?? '' }}
    </div>
</div>

<div class="dh-body">

    @if($errors->any())
    <div class="flash-err">
        <i class="ti ti-alert-triangle" style="font-size:14px;flex-shrink:0;margin-top:2px;"></i>
        <div>
            <strong>Please fix the following:</strong>
            <ul style="margin:4px 0 0 14px;line-height:1.8">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <form action="{{ route('supervisors.update', $supervisor->staff_id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- ── Linked Staff (readonly) ── --}}
        <div class="form-card">
            <div class="form-card-head">
                <i class="ti ti-user" style="font-size:14px;"></i>
                Linked staff member
            </div>
            <div class="form-card-body">
                <div class="staff-strip">
                    <div class="av">
                        {{ strtoupper(substr($supervisor->staff->first_name ?? '?', 0, 1) . substr($supervisor->staff->last_name ?? '?', 0, 1)) }}
                    </div>
                    <div>
                        <div class="staff-name">
                            {{ $supervisor->staff->first_name ?? '—' }} {{ $supervisor->staff->last_name ?? '—' }}
                        </div>
                        <div class="staff-meta">
                            {{ $supervisor->staff_id }} · Branch {{ $supervisor->staff->branch_no ?? '—' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Manager Assignment ── --}}
        <div class="form-card">
            <div class="form-card-head">
                <i class="ti ti-id-badge" style="font-size:14px;"></i>
                Assigned Manager
                <span style="font-size:10px;color:#993556;margin-left:4px;">
                    · Branch {{ $supervisor->staff->branch_no ?? '—' }} only
                </span>
            </div>
            <div class="form-card-body">
                @if($managers->isEmpty())
                    <p class="no-managers">
                        No managers available in Branch {{ $supervisor->staff->branch_no ?? '—' }}.
                    </p>
                @else
                    @foreach($managers as $mgr)
                    <label class="manager-option">
                        <input
                            type="radio"
                            name="manager_no"
                            value="{{ $mgr->staff_id }}"
                            {{ old('manager_no', $supervisor->manager_no) == $mgr->staff_id ? 'checked' : '' }}
                        >
                        <div class="mgr-av">
                            {{ strtoupper(substr($mgr->staff->first_name ?? 'X', 0, 1) . substr($mgr->staff->last_name ?? 'X', 0, 1)) }}
                        </div>
                        <div>
                            <div class="mgr-name">
                                {{ $mgr->staff->first_name ?? '—' }} {{ $mgr->staff->last_name ?? '—' }}
                            </div>
                            <div class="mgr-id">{{ $mgr->staff_id }}</div>
                        </div>
                    </label>
                    @endforeach
                @endif
                @error('manager_no')
                    <span class="field-error" style="display:block;margin-top:6px;">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- ── Responsibility ── --}}
        <div class="form-card">
            <div class="form-card-head">
                <i class="ti ti-clipboard-list" style="font-size:14px;"></i>
                Responsibility
            </div>
            <div class="form-card-body">
                <div class="field-row single">
                    <div class="field-group">
                        <label class="field-label" for="responsibility">
                            Responsibility <span class="field-required">*</span>
                        </label>
                        <textarea
                            id="responsibility"
                            name="responsibility"
                            class="field-textarea @error('responsibility') is-invalid @enderror"
                            placeholder="Describe the supervisor's responsibilities…"
                            required
                        >{{ old('responsibility', $supervisor->responsibility) }}</textarea>
                        <span class="field-hint">Max 500 characters</span>
                        @error('responsibility')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Actions ── --}}
        <div class="action-bar">
            <button type="submit" class="btn-save">
                <i class="ti ti-device-floppy" style="font-size:15px;"></i>
                Save changes
            </button>
            <a href="{{ route('supervisors.index') }}" class="btn-cancel">
                <i class="ti ti-x" style="font-size:14px;"></i>
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>