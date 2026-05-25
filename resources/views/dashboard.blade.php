@extends('layouts.app')

@section('content')
    <div style="margin-bottom: 24px; font-family: sans-serif;">
        <h1 style="color: #611c35; font-size: 24px; font-weight: 700; margin: 0;">
            Property Portfolio Workspace 
            <span style="color: #94a3b8; font-size: 14px; font-weight: 400; margin-left: 8px;">> Operational Control</span>
        </h1>
    </div>

    {{-- Metrics Row Cards --}}
    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-bottom: 24px; font-family: sans-serif;">
        <div style="background: #ffffff; border: 1px solid #f1f5f9; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="color: #94a3b8; font-size: 13px; font-weight: 500;">Total Properties</div>
            <div style="color: #1e293b; font-size: 32px; font-weight: 700; margin: 8px 0 4px 0;">{{ $totalProperties }}</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #f1f5f9; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="color: #94a3b8; font-size: 13px; font-weight: 500;">Total Clients/Owners</div>
            <div style="color: #1e293b; font-size: 32px; font-weight: 700; margin: 8px 0 4px 0;">{{ $totalOwners }}</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #f1f5f9; border-radius: 12px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="color: #94a3b8; font-size: 13px; font-weight: 500;">Available Units</div>
            <div style="color: #15803d; font-size: 32px; font-weight: 700; margin: 8px 0 4px 0;">{{ $availableUnits }}</div>
        </div>
    </div>

    {{-- Empty State or Placeholders --}}
    <div style="background: #ffffff; border: 1px solid #f1f5f9; border-radius: 12px; padding: 48px; text-align: center; color: #94a3b8;">
        <p>No active alerts. Your property portfolio is up to date.</p>
    </div>
@endsection