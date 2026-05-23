<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Manager — DreamHome</title>
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
        .field-guide { list-style: none; display: flex; flex-direction: column; gap: 10px; flex: 1; }
        .fg-item { display: flex; align-items: flex-start; gap: 9px; font-size: 11px; color: rgba(255,255,255,0.6); line-height: 1.5; }
        .fg-icon {
            width: 22px; height: 22px; border-radius: 6px;
            background: rgba(255,255,255,0.12);
            display: flex; align-items: center; justify-content: center;
            font-size: 12px; flex-shrink: 0; color: #F4C0D1;
        }
        .fg-label { font-size: 10px; font-weight: 500; color: #F4C0D1; letter-spacing: 0.04em; display: block; margin-bottom: 1px; }

        .side-note {
            background: rgba(255,255,255,0.08);
            border: 0.5px solid rgba(255,255,255,0.15);
            border-radius: 8px; padding: 10px 12px;
            margin-top: 20px;
            font-size: 10px; color: rgba(255,255,255,0.6); line-height: 1.6;
        }
        .side-note-header {
            display: flex; align-items: center; gap: 6px;
            font-size: 10px; font-weight: 600; color: #F4C0D1;
            margin-bottom: 5px;
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
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

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

        /* alerts */
        .alert-err {
            display: flex; align-items: flex-start; gap: 8px;
            background: #FCEBEB; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 16px;
            font-size: 12px; color: #A32D2D; line-height: 1.6;
        }
        .alert-err i { font-size: 14px; flex-shrink: 0; margin-top: 2px; }
        .alert-err ul { margin: 0; padding-left: 16px; }
        .alert-ok {
            display: flex; align-items: flex-start; gap: 8px;
            background: #EAF3DE; border-radius: 8px;
            padding: 9px 14px; margin-bottom: 16px;
            font-size: 12px; color: #27500A;
        }

        /* section divider */
        .section-label {
            font-size: 9px; font-weight: 700; color: #993556;
            text-transform: uppercase; letter-spacing: 0.1em;
            padding-bottom: 8px;
            border-bottom: 0.5px solid #EDD6D4;
            margin-bottom: 14px; margin-top: 24px;
        }
        .section-label:first-of-type { margin-top: 0; }

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

        .field-note { font-size: 10px; color: #B4B2A9; }
        .field-err  { font-size: 10px; color: #A32D2D; }

        /* ── Staff Preview Card ── */
        .preview-card {
            display: none;
            background: #FEF8F7;
            border: 0.5px solid #EDD6D4;
            border-radius: 10px;
            padding: 14px 16px;
            margin-bottom: 20px;
        }
        .preview-card.show { display: block; }
        .preview-header {
            display: flex; align-items: center; gap: 8px;
            margin-bottom: 12px;
        }
        .preview-av {
            width: 32px; height: 32px; border-radius: 50%;
            background: linear-gradient(135deg, #F4C0D1, #ED93B1);
            color: #4B1528;
            display: flex; align-items: center; justify-content: center;
            font-size: 10px; font-weight: 700; flex-shrink: 0;
            border: 1.5px solid #fff;
            box-shadow: 0 0 0 1px #E8D0CE;
        }
        .preview-name { font-size: 13px; font-weight: 500; color: #4B1528; }
        .preview-sub  { font-size: 10px; color: #993556; }
        .preview-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 10px; padding-top: 10px;
            border-top: 0.5px solid #EDD6D4;
        }
        .preview-item-label { font-size: 9px; color: #B4B2A9; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 2px; }
        .preview-item-value { font-size: 12px; font-weight: 500; color: #3d2030; }
        .bdg { display: inline-flex; align-items: center; font-size: 10px; padding: 2px 8px; border-radius: 99px; font-weight: 600; }
        .bdg-branch  { background: #E6F1FB; color: #0C447C; }
        .bdg-manager { background: #FBEAF0; color: #72243E; }

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
            <div class="side-logo-sub">Management Registry</div>
        </div>
    </div>

    <div class="side-heading">Create a manager record</div>
    <p class="side-sub">
        Promote an existing Manager-position staff member by adding their
        compensation details and start date to the manager table.
    </p>

    <ul class="field-guide">
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-user-check"></i></div>
            <div>
                <span class="fg-label">staff_id</span>
                Only staff with position = Manager and no existing manager record are listed.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-calendar"></i></div>
            <div>
                <span class="fg-label">date_start</span>
                The date this manager assumed their role at the current branch.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-car"></i></div>
            <div>
                <span class="fg-label">car_allowance</span>
                Annual car allowance in £.
            </div>
        </li>
        <li class="fg-item">
            <div class="fg-icon"><i class="ti ti-coin-pound"></i></div>
            <div>
                <span class="fg-label">bonus_payment</span>
                Monthly performance bonus in £.
            </div>
        </li>
    </ul>

    <div class="side-note">
        <div class="side-note-header">
            <i class="ti ti-info-circle" style="font-size:13px;"></i>
            Subtype of Staff
        </div>
        The manager table extends the staff table. Selecting a staff member
        will preview their existing record before you save.
    </div>

    <a href="{{ route('managers.index') }}" class="side-back">
        <i class="ti ti-arrow-left" style="font-size:13px;"></i> Back to managers
    </a>
</aside>

{{-- ── Right Form Area ── --}}
<main class="form-area">
    <div class="form-eyebrow">manager table — new record</div>
    <h1 class="form-title">Add new manager record</h1>

    @if(session('success'))
    <div class="alert-ok">
        <i class="ti ti-circle-check" style="font-size:14px;flex-shrink:0;margin-top:2px;"></i>
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert-err">
        <i class="ti ti-alert-triangle"></i>
        <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
    @endif

    {{-- Staff preview card --}}
    <div class="preview-card" id="staff-preview">
        <div class="preview-header">
            <div class="preview-av" id="prev-av">—</div>
            <div>
                <div class="preview-name" id="prev-name">—</div>
                <div class="preview-sub">Staff record — pulled from staff table</div>
            </div>
        </div>
        <div class="preview-grid">
            <div>
                <div class="preview-item-label">staff_id</div>
                <div class="preview-item-value" id="prev-id">—</div>
            </div>
            <div>
                <div class="preview-item-label">Branch</div>
                <div class="preview-item-value" id="prev-branch">—</div>
            </div>
            <div>
                <div class="preview-item-label">Position</div>
                <div class="preview-item-value"><span class="bdg bdg-manager">Manager</span></div>
            </div>
            <div>
                <div class="preview-item-label">Date joined</div>
                <div class="preview-item-value" id="prev-joined">—</div>
            </div>
            <div>
                <div class="preview-item-label">Salary</div>
                <div class="preview-item-value" id="prev-salary">—</div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('managers.store') }}">
        @csrf

        {{-- Select Staff --}}
        <div class="section-label">Select Staff</div>
        <div class="form-full field">
            <label>staff_id <span class="req">*</span></label>
            <select class="form-sel {{ $errors->has('staff_id') ? 'has-err' : '' }}"
                    name="staff_id" id="sel-staff" required onchange="onStaffSelect()">
                <option value="">— Select a Manager from staff table —</option>
                @foreach($availableManagers as $s)
                    <option value="{{ $s->staff_id }}"
                        data-name="{{ $s->first_name }} {{ $s->last_name }}"
                        data-initials="{{ strtoupper(substr($s->first_name,0,1).substr($s->last_name,0,1)) }}"
                        data-branch="{{ $s->branch_no }}"
                        data-joined="{{ $s->date_joined }}"
                        data-salary="£{{ number_format($s->salary, 0) }}"
                        {{ old('staff_id') == $s->staff_id ? 'selected' : '' }}>
                        {{ $s->staff_id }} — {{ $s->first_name }} {{ $s->last_name }} ({{ $s->branch_no }})
                    </option>
                @endforeach
            </select>
            <span class="field-note">Only staff with position = Manager who do not yet have a manager record are shown.</span>
            @error('staff_id')<div class="field-err">{{ $message }}</div>@enderror
        </div>

        {{-- Compensation --}}
        <div class="section-label">Role Details</div>
        <div class="form-row">
            <div class="field">
                <label>date_start <span class="req">*</span></label>
                <input class="inp {{ $errors->has('date_start') ? 'has-err' : '' }}"
                       type="date" name="date_start" value="{{ old('date_start') }}" required>
                <span class="field-note">Date this manager assumed their role.</span>
                @error('date_start')<div class="field-err">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label>car_allowance (annual) <span class="req">*</span></label>
                <input class="inp {{ $errors->has('car_allowance') ? 'has-err' : '' }}"
                       type="number" name="car_allowance" placeholder="e.g. 2000"
                       value="{{ old('car_allowance') }}" min="0" step="0.01" required>
                <span class="field-note">Annual car allowance in £.</span>
                @error('car_allowance')<div class="field-err">{{ $message }}</div>@enderror
            </div>
        </div>
        <div class="form-full field">
            <label>bonus_payment (monthly) <span class="req">*</span></label>
            <input class="inp {{ $errors->has('bonus_payment') ? 'has-err' : '' }}"
                   type="number" name="bonus_payment" placeholder="e.g. 340"
                   value="{{ old('bonus_payment') }}" min="0" step="0.01" required>
            <span class="field-note">Monthly bonus based on performance.</span>
            @error('bonus_payment')<div class="field-err">{{ $message }}</div>@enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-save">
                <i class="ti ti-device-floppy" style="font-size:15px;"></i> Save manager record
            </button>
            <a href="{{ route('managers.index') }}" class="btn-cancel">
                <i class="ti ti-x" style="font-size:13px;"></i> Cancel
            </a>
        </div>
    </form>
</main>

<script>
function onStaffSelect() {
    var sel     = document.getElementById('sel-staff');
    var opt     = sel.options[sel.selectedIndex];
    var preview = document.getElementById('staff-preview');

    if (!sel.value) { preview.classList.remove('show'); return; }

    var name = opt.dataset.name;
    var initials = opt.dataset.initials;

    document.getElementById('prev-av').textContent      = initials;
    document.getElementById('prev-name').textContent    = name;
    document.getElementById('prev-id').textContent      = sel.value;
    document.getElementById('prev-branch').innerHTML    = '<span class="bdg bdg-branch">' + opt.dataset.branch + '</span>';
    document.getElementById('prev-joined').textContent  = opt.dataset.joined;
    document.getElementById('prev-salary').textContent  = opt.dataset.salary;

    preview.classList.add('show');
}

document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('sel-staff').value) onStaffSelect();
});
</script>

</body>
</html>