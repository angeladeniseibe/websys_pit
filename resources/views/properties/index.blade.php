@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: #1e293b; margin: 0;">Property Records</h2>
        <a href="{{ route('properties.create') }}" style="background: #10b981; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);">
            + Add New Record
        </a>
    </div>
    
    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th style="text-align: left; padding: 12px;">Property Name</th>
                    <th style="text-align: left; padding: 12px;">Branch</th>
                    <th style="text-align: left; padding: 12px;">Managed By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">{{ $property->name }}</td>
                    <td style="padding: 12px; color: #64748b;">{{ $property->branch->name }}</td>
                    <td style="padding: 12px;">{{ $property->staff->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection