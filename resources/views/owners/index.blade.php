@extends('layouts.app')

@section('content')

<style>
    .pm-wrap { max-width: 1100px; margin: 0 auto; padding: 32px 24px; font-family: 'DM Sans', sans-serif; }

    .pm-role-bar {
        display: flex; align-items: center; gap: 12px;
        background: #f8f7f4; border: 1px solid #e5e2db;
        border-radius: 10px; padding: 10px 18px;
        margin-bottom: 28px; font-size: 13.5px;
    }
    .pm-role-badge {
        font-size: 11px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase;
        padding: 3px 10px; border-radius: 20px;
    }
    .pm-role-badge.admin  { background: #1c3a5e; color: #e8f0fa; }
    .pm-role-badge.client { background: #e8ede4; color: #3a5228; }
    .pm-role-bar a {
        margin-left: auto; font-size: 13px; color: #7a6f5d;
        text-decoration: none; padding: 5px 13px;
        border: 1px solid #ddd9d0; border-radius: 7px; transition: background .15s;
    }
    .pm-role-bar a:hover { background: #eeebe5; }
    .pm-role-bar a.active { background: #1c3a5e; color: #fff; border-color: #1c3a5e; }

    .pm-header { display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 22px; }
    .pm-header h1 { font-size: 26px; font-weight: 700; color: #1a1714; margin: 0; letter-spacing: -.02em; }
    .pm-header p  { font-size: 13.5px; color: #8a8178; margin: 4px 0 0; }

    .pm-add-btn {
        display: inline-flex; align-items: center; gap: 7px;
        background: #1c3a5e; color: #fff; padding: 10px 20px;
        border-radius: 9px; text-decoration: none; font-size: 14px; font-weight: 600;
        transition: background .15s;
    }
    .pm-add-btn:hover { background: #24507e; }
    .pm-add-btn svg { width: 16px; height: 16px; }

    .pm-card { background: #fff; border: 1px solid #e5e2db; border-radius: 14px; overflow: hidden; }

    .pm-table { width: 100%; border-collapse: collapse; }
    .pm-table thead tr { background: #f8f7f4; border-bottom: 1px solid #e5e2db; }
    .pm-table th {
        text-align: left; padding: 13px 18px;
        font-size: 11.5px; font-weight: 700; letter-spacing: .07em;
        text-transform: uppercase; color: #8a8178;
    }
    .pm-table tbody tr { border-bottom: 1px solid #f0ede7; transition: background .1s; }
    .pm-table tbody tr:last-child { border-bottom: none; }
    .pm-table tbody tr:hover { background: #faf9f6; }
    .pm-table td { padding: 14px 18px; font-size: 14px; color: #2d2925; }

    .pm-id { font-weight: 700; font-family: 'DM Mono', monospace; font-size: 13px; color: #5a5047; }

    .pm-avatar {
        width: 34px; height: 34px; border-radius: 50%;
        background: #eef2f8; color: #2a4a72;
        display: inline-flex; align-items: center; justify-content: center;
        font-size: 12px; font-weight: 700; margin-right: 10px; vertical-align: middle;
        flex-shrink: 0;
    }
    .pm-name-cell { display: flex; align-items: center; }

    .pm-email { color: #1c3a5e; font-size: 13.5px; }
    .pm-phone { font-family: 'DM Mono', monospace; font-size: 13px; color: #5a5047; }

    .pm-actions { display: flex; gap: 8px; }
    .pm-btn-edit, .pm-btn-del {
        font-size: 12.5px; font-weight: 600; padding: 5px 12px;
        border-radius: 7px; text-decoration: none; border: none; cursor: pointer; transition: background .15s;
    }
    .pm-btn-edit { background: #f0f4fb; color: #1c4d8a; border: 1px solid #d3deee; }
    .pm-btn-edit:hover { background: #dce8f7; }
    .pm-btn-del  { background: #fcf0ee; color: #8c2a1e; border: 1px solid #f2d4cf; }
    .pm-btn-del:hover  { background: #f6d8d3; }

    .pm-empty { text-align: center; padding: 48px 20px; color: #b0a89e; font-size: 14.5px; }

    .pm-flash {
        padding: 12px 18px; border-radius: 9px; margin-bottom: 20px;
        font-size: 14px; font-weight: 500;
        background: #edf6ef; color: #1e5c38; border: 1px solid #b8dfc4;
    }
</style>

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">

<div class="pm-wrap">

    {{-- Role Switcher --}}
    <div class="pm-role-bar">
        <span style="color:#5a5047; font-weight:600; font-size:13px;">Viewing as:</span>
        <span class="pm-role-badge {{ session('user_role', 'client') }}">
            {{ strtoupper(session('user_role', 'client')) }}
        </span>
        <a href="{{ url('/simulate/client') }}" @if(session('user_role','client')==='client') class="active" @endif>Client</a>
        <a href="{{ url('/simulate/admin') }}"  @if(session('user_role')==='admin') class="active" @endif>Admin</a>
    </div>

    {{-- Flash --}}
    @if(session('success'))
        <div class="pm-flash">{{ session('success') }}</div>
    @endif

    {{-- Page Header --}}
    <div class="pm-header">
        <div>
            <h1>Owner Records</h1>
            <p>{{ $owners->count() }} {{ Str::plural('owner', $owners->count()) }} registered</p>
        </div>
        @if(session('user_role') === 'admin')
            <a href="{{ route('owners.create') }}" class="pm-add-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Add Owner
            </a>
        @endif
    </div>

    {{-- Table Card --}}
    <div class="pm-card">
        <table class="pm-table">
            <thead>
                <tr>
                    <th>Owner ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    @if(session('user_role') === 'admin')
                        <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($owners as $owner)
                    @php
                        $initials = collect(explode(' ', $owner->name ?? $owner->full_name ?? '??'))
                            ->map(fn($w) => strtoupper($w[0] ?? ''))
                            ->take(2)->implode('');
                    @endphp
                    <tr>
                        <td><span class="pm-id">{{ $owner->owner_id }}</span></td>
                        <td>
                            <div class="pm-name-cell">
                                <span class="pm-avatar">{{ $initials }}</span>
                                {{ $owner->name ?? $owner->full_name }}
                            </div>
                        </td>
                        <td><span class="pm-email">{{ $owner->email ?? 'N/A' }}</span></td>
                        <td><span class="pm-phone">{{ $owner->phone }}</span></td>
                        @if(session('user_role') === 'admin')
                            <td>
                                <div class="pm-actions">
                                    <a href="{{ route('owners.edit', $owner->owner_id) }}" class="pm-btn-edit">Edit</a>
                                    <form action="{{ route('owners.destroy', $owner->owner_id) }}" method="POST"
                                          onsubmit="return confirm('Remove this owner record?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="pm-btn-del">Delete</button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ session('user_role') === 'admin' ? 5 : 4 }}" class="pm-empty">
                            No owner records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection