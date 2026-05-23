<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Branch — DreamHome</title>
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
            grid-template-columns: 300px 1fr;
        }

        /* ── Left Panel ── */
        .side-panel {
            background: linear-gradient(160deg, #4B1528 0%, #72243E 55%, #993556 100%);
            min-height: 100vh;
            padding: 32px 28px;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }
        .side-panel::before {
            content: '';
            position: absolute;
            bottom: -80px; right: -80px;
            width: 280px; height: 280px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }
        .side-panel::after {
            content: '';
            position: absolute;
            top: 40%; left: -60px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,0.03);
        }

        .side-logo {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 48px;
            position: relative; z-index: 1;
        }
        .side-logo-icon {
            width: 36px; height: 36px;
            background: rgba(255,255,255,0.15);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
        }
        .side-logo-text {
            font-family: 'DM Serif Display', serif;
            font-size: 18px; color: #fff;
            letter-spacing: -0.3px;
        }
        .side-logo-sub {
            font-size: 10px; color: rgba(255,255,255,0.5);
            text-transform: uppercase; letter-spacing: 0.08em;
        }

        .side-heading {
            font-family: 'DM Serif Display', serif;
            font-size: 26px; color: #fff;
            line-height: 1.25;
            font-weight: 400;
            letter-spacing: -0.4px;
            margin-bottom: 10px;
            position: relative; z-index: 1;
        }
        .side-sub {
            font-size: 12px;
            color: rgba(255,255,255,0.55);
            line-height: 1.65;
            margin-bottom: 32px;
            position: relative; z-index: 1;
        }

        /* field guide list */
        .field-guide {
            list-style: none;
            display: flex; flex-direction: column; gap: 10px;
            position: relative; z-index: 1;
            flex: 1;
        }
        .fg-item {
            display: flex; align-items: flex-start; gap: 10px;
            font-size: 11px; color: rgba(255,255,255,0.65);
            line-height: 1.5;
        }
        .fg-icon {
            width: 24px; height: 24px;
            border-radius: 6px;
            background: rgba(255,255,255,0.12);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; flex-shrink: 0;
            color: #F4C0D1;
        }
        .fg-label {
            font-size: 10px;
            font-weight: 500;
            color: #F4C0D1;
            letter-spacing: 0.04em;
            display: block;
            margin-bottom: 1px;
        }

        .side-back {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 11px; color: rgba(255,255,255,0.5);
            text-decoration: none;
            position: relative; z-index: 1;
            margin-top: 32px;
            transition: color 0.15s;
        }
        .side-back:hover { color: rgba(255,255,255,0.85); }

        /* ── Right Form Area ── */
        .form-area {
            padding: 40px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 680px;
        }

        .form-eyebrow {
            font-size: 10px;
            font-weight: 600;
            color: #993556;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 6px;
        }
        .form-title {
            font-family: 'DM Serif Display', serif;
            font-size: 24px;
            color: #4B1528;
            font-weight: 400;
            letter-spacing: -0.3px;
            margin-bottom: 28px;
        }

        /* section divider */
        .section-label {
            font-size: 9px;
            font-weight: 700;
            color: #993556;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            padding-bottom: 8px;
            border-bottom: 0.5px solid #EDD6D4;
            margin-bottom: 14px;
            margin-top: 22px;
        }
        .section-label:first-of-type { margin-top: 0; }

        /* form grid */
        .form-row  { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px; }
        .form-full { margin-bottom: 14px; }

        /* field */
        .field { display: flex; flex-direction: column; gap: 4px; }
        .field label {
            font-size: 10px; font-weight: 600;
            color: #72243E;
            text-transform: uppercase; letter-spacing: 0.07em;
        }
        .field label .opt {
            font-weight: 400; color: #B4B2A9;
            text-transform: none; letter-spacing: 0;
        }
        .field label .req { color: #A32D2D; }

        .field input[type="text"] {
            width: 100%;
            padding: 9px 11px;
            border: 0.5px solid #C4A8A4;
            border-radius: 8px;
            font-size: 12px;
            font-family: 'DM Sans', sans-serif;
            background: #fff;
            color: #3d2030;
            outline: none;
            transition: border-color 0.15s, box-shadow 0.15s;
        }
        .field input[type="text"]:focus {
            border-color: #72243E;
            box-shadow: 0 0 0 3px rgba(114,36,62,0.08);
        }
        .field input.has-err { border-color: #A32D2D; }

        .field-note { font-size: 10px; color: #B4B2A9; }
        .field-err  { font-size: 10px; color: #A32D2D; }

        /* actions */
        .form-actions {
            display: flex; align-items: center; gap: 12px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 0.5px solid #EDD6D4;
        }
        .btn-save {
            display: inline-flex; align-items: center; gap: 7px;
            background: #72243E; color: #FBEAF0;
            border: none; border-radius: 8px;
            padding: 10px 20px;
            font-size: 13px; font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            transition: background 0.15s;
        }
        .btn-save:hover { background: #4B1528; }
        .btn-cancel {
            display: inline-flex; align-items: center; gap: 5px;
            font-size: 12px; color: #993556;
            text-decoration: none;
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
            <div class="side-logo-sub">Branch Network</div>
        </div>
    </div>

    <div class="side-heading">Register a new branch location</div>
    <p class="side-sub">
        Fill in the branch details on the right. Each branch gets a unique
        identifier and is tracked across the DreamHome property network.
    </p>

    <ul class="field-guide">
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-hash"></i></div>
            <div>
                <span class="fg-label">branch_no</span>
                Primary key — must be unique. Use a short code like B011.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-map-pin"></i></div>
            <div>
                <span class="fg-label">street &amp; city</span>
                Required. Full street address and the city the branch operates in.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-map-2"></i></div>
            <div>
                <span class="fg-label">area &amp; postcode</span>
                Optional. Useful for district-level filtering and postal routing.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-phone"></i></div>
            <div>
                <span class="fg-label">telephone &amp; fax</span>
                Optional contact numbers for the branch office.
            </div>
        </li>
    </ul>

    <a href="{{ route('branches.index') }}" class="side-back">
        <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back to branches
    </a>
</aside>

{{-- ── Right Form Area ── --}}
<main class="form-area">
    <div class="form-eyebrow">branch table — new record</div>
    <h1 class="form-title">Add new branch</h1>

    <form method="POST" action="{{ route('branches.store') }}">
        @csrf

        {{-- Identity --}}
        <div class="section-label">Identity</div>
        <div class="form-row">
            <div class="field">
                <label>branch_no <span class="req">*</span></label>
                <input type="text"
                       name="branch_no"
                       value="{{ old('branch_no') }}"
                       placeholder="e.g. B011"
                       class="{{ $errors->has('branch_no') ? 'has-err' : '' }}"
                       maxlength="10">
                <span class="field-note">Primary key — must be unique</span>
                @error('branch_no')<div class="field-err">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label>city <span class="req">*</span></label>
                <input type="text"
                       name="city"
                       value="{{ old('city') }}"
                       placeholder="e.g. Manila"
                       class="{{ $errors->has('city') ? 'has-err' : '' }}"
                       maxlength="50">
                @error('city')<div class="field-err">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Address --}}
        <div class="section-label">Address</div>
        <div class="form-full field">
            <label>street <span class="req">*</span></label>
            <input type="text"
                   name="street"
                   value="{{ old('street') }}"
                   placeholder="e.g. 12 Corrales Avenue"
                   class="{{ $errors->has('street') ? 'has-err' : '' }}"
                   maxlength="100">
            @error('street')<div class="field-err">{{ $message }}</div>@enderror
        </div>
        <div class="form-row">
            <div class="field">
                <label>area <span class="opt">(optional)</span></label>
                <input type="text"
                       name="area"
                       value="{{ old('area') }}"
                       placeholder="e.g. Divisoria"
                       maxlength="100">
                @error('area')<div class="field-err">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label>postcode <span class="opt">(optional)</span></label>
                <input type="text"
                       name="postcode"
                       value="{{ old('postcode') }}"
                       placeholder="e.g. 9000"
                       maxlength="20">
                @error('postcode')<div class="field-err">{{ $message }}</div>@enderror
            </div>
        </div>

        {{-- Contact --}}
        <div class="section-label">Contact</div>
        <div class="form-row">
            <div class="field">
                <label>telephone <span class="opt">(optional)</span></label>
                <input type="text"
                       name="telephone"
                       value="{{ old('telephone') }}"
                       placeholder="e.g. 088-857-1001"
                       maxlength="20">
                @error('telephone')<div class="field-err">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label>fax <span class="opt">(optional)</span></label>
                <input type="text"
                       name="fax"
                       value="{{ old('fax') }}"
                       placeholder="e.g. 088-857-1002"
                       maxlength="20">
                @error('fax')<div class="field-err">{{ $message }}</div>@enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">
                <i class="ti ti-device-floppy" style="font-size:15px;"></i> Save branch
            </button>
            <a href="{{ route('branches.index') }}" class="btn-cancel">
                <i class="ti ti-x" style="font-size:13px;"></i> Cancel
            </a>
        </div>
    </form>
</main>

</body>
</html>