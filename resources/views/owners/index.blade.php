@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2 style="color: #1e293b;">Owner Records</h2>
        <a href="{{ route('owners.create') }}" style="background: #10b981; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">+ Add New Record</a>
    </div>

    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th style="text-align: left; padding: 12px;">Full Name</th>
                    <th style="text-align: left; padding: 12px;">Email</th>
                    <th style="text-align: left; padding: 12px;">Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($owners as $owner)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">{{ $owner->name }}</td>
                    <td style="padding: 12px;">{{ $owner->email }}</td>
                    <td style="padding: 12px;">{{ $owner->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection