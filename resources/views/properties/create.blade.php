@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
            <h2 style="color: #1e293b; margin: 0;">Register Property Row Form</h2>
            <a href="{{ route('properties.index') }}" style="color: #64748b; text-decoration: none;">&larr; Return</a>
        </div>

        <form action="{{ route('properties.store') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">PROPERTY_ID [PRIMARY KEY]</label>
                    <input type="text" name="property_id" placeholder="e.g., PA14" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 5px;">TYPE</label>
                    <input type="text" name="type" placeholder="e.g., Flat, House" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 6px;">
                </div>
                </div>

            <button type="submit" style="background: #881337; color: white; padding: 12px 24px; border: none; border-radius: 6px; cursor: pointer; font-weight: bold;">
                Save Entry
            </button>
        </form>
    </div>
</div>
@endsection