@extends('layouts.app')

@section('content')

<style>
    .pm-wrap { max-width: 760px; margin: 0 auto; padding: 32px 24px; font-family: 'DM Sans', sans-serif; }

    .pm-breadcrumb {
        display: flex; align-items: center; gap: 8px;
        font-size: 13.5px; color: #8a8178; margin-bottom: 26px;
    }
    .pm-breadcrumb a { color: #1c3a5e; text-decoration: none; font-weight: 500; }
    .pm-breadcrumb a:hover { text-decoration: underline; }
    .pm-breadcrumb span { font-size: 11px; color: #c0b8ae; }

    .pm-form-card { background: #fff; border: 1px solid #e5e2db; border-radius: 16px; overflow: hidden; }

    .pm-form-header {
        padding: 24px 28px 20px; border-bottom: 1px solid #f0ede7; background: #faf9f6;
    }
    .pm-form-header h1 { font-size: 20px; font-weight: 700; color: #1a1714; margin: 0 0 4px; letter-spacing: -.02em; }
    .pm-form-header p  { font-size: 13.5px; color: #8a8178; margin: 0; }

    .pm-form-body { padding: 28px; }

    .pm-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .pm-grid-1 { display: grid; grid-template-columns: 1fr; gap: 20px; }

    .pm-field { display: flex; flex-direction: column; gap: 6px; }
    .pm-field label {
        font-size: 12px; font-weight: 700; letter-spacing: .07em;
        text-transform: uppercase; color: #6a6158;
    }
    .pm-field label .pm-required { color: #b54a3a; margin-left: 2px; }
    .pm-field input {
        width: 100%; padding: 10px 13px; box-sizing: border-box;
        border: 1px solid #ddd9d0; border-radius: 8px;
        font-size: 14px; color: #1a1714; background: #fff;
        font-family: 'DM Sans', sans-serif;
        transition: border-color .15s, box-shadow .15s; outline: none;
    }
    .pm-field input:focus {
        border-color: #1c3a5e;
        box-shadow: 0 0 0 3px rgba(28,58,94,.1);
    }
    .pm-field input[readonly] { background: #f8f7f4; color: #8a8178; cursor: not-allowed; }
    .pm-field input::placeholder { color: #b5afa8; }
    .pm-field .pm-hint { font-size: 12px; color: #a09890; margin-top: 2px; }

    .pm-id-field input { font-family: 'DM Mono', monospace; font-size: 13.5px; letter-spacing: .04em; }

    .pm-section-label {
        font-size: 11px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase;
        color: #b5afa8; padding-bottom: 10px; margin-top: 8px;
        border-bottom: 1px solid #f0ede7; margin-bottom: 20px;
    }

    .pm-error { color: #b54a3a; font-size: 12px; margin-top: 3px; }
    .pm-input-err { border-color: #d97b6e !important; }

    .pm-form-footer {
        display: flex; align-items: center; justify-content: space-between;
        padding: 20px 28px; border-top: 1px solid #f0ede7; background: #faf9f6;
    }
    .pm-cancel {
        font-size: 14px; color: #7a6f5d; text-decoration: none; font-weight: 500;
        padding: 9px 18px; border: 1px solid #ddd9d0; border-radius: 8px; transition: background .15s;
    }
    .pm-cancel:hover { background: #f0ede7; }
    .pm-submit {
        background: #1c3a5e; color: #fff; font-size: 14.5px; font-weight: 700;
        padding: 10px 28px; border: none; border-radius: 9px; cursor: pointer;
        font-family: 'DM Sans', sans-serif; transition: background .15s;
    }
    .pm-submit:hover { background: #24507e; }
</style>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<div class="pm-wrap">

    {{-- Breadcrumb --}}
    <div class="pm-breadcrumb">
        <a href="{{ route('owners.index') }}">Owner Records</a>
        <span>›</span>
        <span>{{ isset($owner) ? 'Edit Owner' : 'Add New Owner' }}</span>
    </div>

    <div class="pm-form-card">
        {{-- Header --}}
        <div class="pm-form-header">
            <h1>{{ isset($owner) ? 'Edit Owner' : 'Register New Owner' }}</h1>
            <p>{{ isset($owner) ? 'Update the details for ' . $owner->owner_id . '.' : 'Fill in the fields below to register an owner.' }}</p>
        </div>

        {{-- Form --}}
        <form action="{{ isset($owner) ? route('owners.update', $owner->owner_id) : route('owners.store') }}" method="POST">
            @csrf
            @if(isset($owner)) @method('PUT') @endif

            <div class="pm-form-body">

                {{-- Identity --}}
                <div class="pm-section-label">Identity</div>
                <div class="pm-grid-2" style="margin-bottom: 20px;">
                    <div class="pm-field pm-id-field">
                        <label>Owner ID <span class="pm-required">*</span></label>
                        <input type="text" name="owner_id"
                               value="{{ old('owner_id', $owner->owner_id ?? '') }}"
                               placeholder="e.g. CO45"
                               {{ isset($owner) ? 'readonly' : '' }}
                               class="{{ $errors->has('owner_id') ? 'pm-input-err' : '' }}">
                        @if(isset($owner))
                            <span class="pm-hint">Primary key — cannot be changed.</span>
                        @endif
                        @error('owner_id') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="pm-field">
                        <label>Full Name <span class="pm-required">*</span></label>
                        <input type="text" name="name"
                               value="{{ old('name', $owner->name ?? '') }}"
                               placeholder="e.g. John Doe"
                               class="{{ $errors->has('name') ? 'pm-input-err' : '' }}">
                        @error('name') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Contact --}}
                <div class="pm-section-label">Contact Details</div>
                <div class="pm-grid-2" style="margin-bottom: 20px;">
                    <div class="pm-field">
                        <label>Email Address <span class="pm-required">*</span></label>
                        <input type="email" name="email"
                               value="{{ old('email', $owner->email ?? '') }}"
                               placeholder="e.g. john@example.com"
                               class="{{ $errors->has('email') ? 'pm-input-err' : '' }}">
                        @error('email') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="pm-field">
                        <label>Phone Number <span class="pm-required">*</span></label>
                        <input type="text" name="phone"
                               value="{{ old('phone', $owner->phone ?? '') }}"
                               placeholder="e.g. 09123456789"
                               class="{{ $errors->has('phone') ? 'pm-input-err' : '' }}">
                        @error('phone') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Address --}}
                <div class="pm-section-label">Address</div>
                <div class="pm-grid-1">
                    <div class="pm-field">
                        <label>Street Address</label>
                        <input type="text" name="address"
                               value="{{ old('address', $owner->address ?? '') }}"
                               placeholder="e.g. 12 Elm Street">
                        @error('address') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                </div>

            </div>

            {{-- Footer --}}
            <div class="pm-form-footer">
                <a href="{{ route('owners.index') }}" class="pm-cancel">Cancel</a>
                <button type="submit" class="pm-submit">
                    {{ isset($owner) ? 'Save Changes' : 'Add Owner' }}
                </button>
            </div>
        </form>
    </div>

</div>
@endsection