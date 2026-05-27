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

    .pm-form-card {
        background: #fff; border: 1px solid #e5e2db;
        border-radius: 16px; overflow: hidden;
    }
    .pm-form-header {
        padding: 24px 28px 20px;
        border-bottom: 1px solid #f0ede7;
        background: #faf9f6;
    }
    .pm-form-header h1 { font-size: 20px; font-weight: 700; color: #1a1714; margin: 0 0 4px; letter-spacing: -.02em; }
    .pm-form-header p { font-size: 13.5px; color: #8a8178; margin: 0; }

    .pm-form-body { padding: 28px; }

    .pm-grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .pm-grid-1 { display: grid; grid-template-columns: 1fr; gap: 20px; }

    .pm-field { display: flex; flex-direction: column; gap: 6px; }
    .pm-field label {
        font-size: 12px; font-weight: 700; letter-spacing: .07em;
        text-transform: uppercase; color: #6a6158;
    }
    .pm-field label .pm-required { color: #b54a3a; margin-left: 2px; }
    .pm-field input, .pm-field select {
        width: 100%; padding: 10px 13px; box-sizing: border-box;
        border: 1px solid #ddd9d0; border-radius: 8px;
        font-size: 14px; color: #1a1714; background: #fff;
        font-family: 'DM Sans', sans-serif;
        transition: border-color .15s, box-shadow .15s;
        outline: none;
    }
    .pm-field input:focus, .pm-field select:focus {
        border-color: #1c3a5e;
        box-shadow: 0 0 0 3px rgba(28,58,94,.1);
    }
    .pm-field input::placeholder { color: #b5afa8; }
    .pm-field .pm-hint { font-size: 12px; color: #a09890; margin-top: 2px; }

    .pm-id-field input { font-family: 'DM Mono', monospace; font-size: 13.5px; letter-spacing: .04em; }

    .pm-section-label {
        font-size: 11px; font-weight: 700; letter-spacing: .1em;
        text-transform: uppercase; color: #b5afa8;
        padding: 0 0 10px; margin-top: 8px;
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
        padding: 9px 18px; border: 1px solid #ddd9d0; border-radius: 8px;
        transition: background .15s;
    }
    .pm-cancel:hover { background: #f0ede7; }
    .pm-submit {
        background: #1c3a5e; color: #fff; font-size: 14.5px; font-weight: 700;
        padding: 10px 28px; border: none; border-radius: 9px; cursor: pointer;
        font-family: 'DM Sans', sans-serif; letter-spacing: .01em;
        transition: background .15s;
    }
    .pm-submit:hover { background: #24507e; }
</style>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<div class="pm-wrap">

    {{-- Breadcrumb --}}
    <div class="pm-breadcrumb">
        <a href="{{ route('properties.index') }}">Property Records</a>
        <span>›</span>
        <span>{{ isset($property) ? 'Edit Property' : 'Add New Property' }}</span>
    </div>

    <div class="pm-form-card">
        {{-- Header --}}
        <div class="pm-form-header">
            <h1>{{ isset($property) ? 'Edit Property' : 'Register New Property' }}</h1>
            <p>{{ isset($property) ? 'Update the details for ' . $property->property_id . '.' : 'Fill in the fields below to add a property to the records.' }}</p>
        </div>

        {{-- Form --}}
        <form action="{{ isset($property) ? route('properties.update', $property->property_id) : route('properties.store') }}" method="POST">
            @csrf
            @if(isset($property)) @method('PUT') @endif

            <div class="pm-form-body">

                {{-- Identity --}}
                <div class="pm-section-label">Identity</div>
                <div class="pm-grid-2" style="margin-bottom: 20px;">
                    <div class="pm-field pm-id-field">
                        <label>Property ID <span class="pm-required">*</span></label>
                        <input type="text" name="property_id"
                               value="{{ old('property_id', $property->property_id ?? '') }}"
                               placeholder="e.g. PA14"
                               {{ isset($property) ? 'readonly' : '' }}
                               class="{{ $errors->has('property_id') ? 'pm-input-err' : '' }}">
                        @if(isset($property))
                            <span class="pm-hint">Primary key — cannot be changed.</span>
                        @endif
                        @error('property_id') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="pm-field">
                        <label>Property Type <span class="pm-required">*</span></label>
                        <select name="type" class="{{ $errors->has('type') ? 'pm-input-err' : '' }}">
                            <option value="">— Select type —</option>
                            @foreach(['Flat','House','Studio','Maisonette','Bungalow','Duplex','Commercial'] as $t)
                                <option value="{{ $t }}" {{ old('type', $property->type ?? '') === $t ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                        @error('type') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Financials --}}
                <div class="pm-section-label">Financials</div>
                <div class="pm-grid-2" style="margin-bottom: 20px;">
                    <div class="pm-field">
                        <label>Monthly Rent ($) <span class="pm-required">*</span></label>
                        <input type="number" name="rent" step="0.01" min="0"
                               value="{{ old('rent', $property->rent ?? '') }}"
                               placeholder="e.g. 1200.00"
                               class="{{ $errors->has('rent') ? 'pm-input-err' : '' }}">
                        @error('rent') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="pm-field">
                        <label>Branch No.</label>
                        <select name="branch_no" class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">
                            <option value="" disabled selected>Select Branch</option>
                            @foreach($branches as $branch)
                                <option value="{{$branch->branch_no}}">{{$branch->branch_no}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pm-field">
                        <label>Owner ID</label>
                        <input type="text" name="owner_id"
                               value="{{ old('owner_id', $property->owner_id ?? '') }}"
                               placeholder="e.g. O001">
                        @error('owner_id') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                </div>


                {{-- Location --}}
                <div class="pm-section-label">Location</div>
                <div class="pm-grid-1" style="margin-bottom: 20px;">
                    <div class="pm-field">
                        <label>Street Address <span class="pm-required">*</span></label>
                        <input type="text" name="street"
                               value="{{ old('street', $property->street ?? '') }}"
                               placeholder="e.g. 10 Elm Street"
                               class="{{ $errors->has('street') ? 'pm-input-err' : '' }}">
                        @error('street') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="pm-grid-2">
                    <div class="pm-field">
                        <label>City <span class="pm-required">*</span></label>
                        <input type="text" name="city"
                               value="{{ old('city', $property->city ?? '') }}"
                               placeholder="e.g. Manchester"
                               class="{{ $errors->has('city') ? 'pm-input-err' : '' }}">
                        @error('city') <span class="pm-error">{{ $message }}</span> @enderror
                    </div>
                    <div class="pm-field">
                        <label>Postcode</label>
                        <input type="text" name="postcode"
                               value="{{ old('postcode', $property->postcode ?? '') }}"
                               placeholder="e.g. M1 4AB">
                    </div>
                </div>

            </div>

            {{-- Footer --}}
            <div class="pm-form-footer">
                <a href="{{ route('properties.index') }}" class="pm-cancel">Cancel</a>
                <button type="submit" class="pm-submit">
                    {{ isset($property) ? 'Save Changes' : 'Add Property' }}
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
