@extends('layouts.app')

@section('content')
<div class="container" style="padding: 20px;">
    <h2 style="margin-bottom: 20px; color: #1e293b;">Owner Records</h2>
    
    <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 2px solid #f1f5f9;">
                    <th style="text-align: left; padding: 12px;">Name</th>
                    <th style="text-align: left; padding: 12px;">Email</th>
                    <th style="text-align: left; padding: 12px;">Phone</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through $owners as defined in the controller --}}
                @foreach($owners as $owner)
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px;">{{ $owner->name }}</td>
                    <td style="padding: 12px; color: #64748b;">{{ $owner->email }}</td>
                    <td style="padding: 12px;">{{ $owner->phone }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection