<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Manager — DreamHome</title>
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

        /* ── Body ── */
        .dh-body { padding: 20px 28px 40px; max-width: 640px; }

        /* ── Flash ── */
        .flash-err {
            display: flex; align-items: flex-start; gap: 8px;
            background: #FCEBEB; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 14px;
            font-size: 12px; color: #A32D2D;
        }

        /* ── Card form ── */
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

        /* ── Staff readonly strip ── */
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

        /* ── Field groups ── */
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

        .field-input {
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
        .field-input:focus { border-color: #993556; }
        .field-input.mono { font-family: 'Courier New', monospace; font-size: 12px; }

        .field-error { font-size: 11px; color: #A32D2D; margin-top: 2px; }
        .field-input.is-invalid { border-color: #E24B4A; }

        /* ── Action bar ── */
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
                <div class="dh-logo-sub">Management Network</div>
            </div>
        </div>
        <a href="{{ route('managers.index') }}" class="back-link">
            <i class="ti ti-arrow-left" style="font-size:13px;"></i> All Managers
        </a>
    </div>

    <div class="dh-page-title">Edit Manager</div>
    <div class="dh-page-sub">
        <i class="ti ti-pencil" style="font-size:13px;"></i>
        Updating record for — {{ $manager->staff->first_name ?? '' }} {{ $manager->staff->last_name ?? '' }}
    </div>
</div>

{{-- ── Body ── --}}
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

    <form action="{{ route('managers.update', $manager->staff_id) }}" method="POST">
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
                        {{ strtoupper(substr($manager->staff->first_name ?? '?', 0, 1) . substr($manager->staff->last_name ?? '?', 0, 1)) }}
                    </div>
                    <div>
                        <div class="staff-name">
                            {{ $manager->staff->first_name ?? '—' }} {{ $manager->staff->last_name ?? '—' }}
                        </div>
                        <div class="staff-meta">{{ $manager->staff_id }} · {{ $manager->staff->branch_no ?? '—' }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── Manager Details ── --}}
        <div class="form-card">
            <div class="form-card-head">
                <i class="ti ti-id-badge" style="font-size:14px;"></i>
                Manager details
            </div>
            <div class="form-card-body">

                <div class="field-row single">
                    <div class="field-group">
                        <label class="field-label" for="date_start">
                            Date Start <span class="field-required">*</span>
                        </label>
                        <input
                            type="date"
                            id="date_start"
                            name="date_start"
                            class="field-input @error('date_start') is-invalid @enderror"
                            value="{{ old('date_start', $manager->date_start) }}"
                            required
                        >
                        @error('date_start')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        {{-- ── Compensation ── --}}
        <div class="form-card">
            <div class="form-card-head">
                <i class="ti ti-coin" style="font-size:14px;"></i>
                Compensation
            </div>
            <div class="form-card-body">

                <div class="field-row">
                    <div class="field-group">
                        <label class="field-label" for="car_allowance">
                            Car Allowance <span class="field-required">*</span>
                        </label>
                        <input
                            type="number"
                            id="car_allowance"
                            name="car_allowance"
                            class="field-input mono @error('car_allowance') is-invalid @enderror"
                            value="{{ old('car_allowance', $manager->car_allowance) }}"
                            placeholder="e.g. 5000"
                            min="0" step="1"
                            required
                        >
                        <span class="field-hint">Annual · in £</span>
                        @error('car_allowance')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="field-group">
                        <label class="field-label" for="bonus_payment">
                            Bonus Payment <span class="field-required">*</span>
                        </label>
                        <input
                            type="number"
                            id="bonus_payment"
                            name="bonus_payment"
                            class="field-input mono @error('bonus_payment') is-invalid @enderror"
                            value="{{ old('bonus_payment', $manager->bonus_payment) }}"
                            placeholder="e.g. 500"
                            min="0" step="1"
                            required
                        >
                        <span class="field-hint">Monthly · in £</span>
                        @error('bonus_payment')
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
            <a href="{{ route('managers.index') }}" class="btn-cancel">
                <i class="ti ti-x" style="font-size:14px;"></i>
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>