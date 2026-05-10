@extends('layouts.app')

@section('content')

<!-- HEADER (CENTER TITLE + RIGHT BUTTON) -->
<!-- HEADER -->
<div class="mb-6">

    <!-- TITLE (CENTERED ON TOP) -->
    <h1 class="text-2xl font-bold text-center mb-4">
        Client Registration List
    </h1>

  
</div>

<!-- SEARCH BAR -->
<form method="GET" action="{{ route('registrations.index') }}" class="mb-4 flex gap-2">
    <input type="text"
           name="search"
           value="{{ $search ?? '' }}"
           placeholder="Search client name or phone..."
           class="border p-2 rounded w-1/3">

    <button class="btn primary">Search</button>

    <a href="{{ route('registrations.index') }}" class="btn secondary">
        Reset
    </a>
</form>

  <!-- BUTTON ROW -->
    <div class="flex items-center justify-between">

        <!-- LEFT: ADD REGISTRATION -->
        <a href="{{ route('registrations.create') }}"
           class="btn primary">
            + Add New Registration
        </a>

        <!-- RIGHT: VIEW CLIENTS -->
        <a href="{{ route('clients.index') }}"
           class="btn primary">
            View Clients
        </a>

    </div>


<table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="px-4 py-3">Registration ID</th>
            <th class="px-4 py-3">Client Name</th>
            <th class="px-4 py-3">Address</th>
            <th class="px-4 py-3">Phone</th>
            <th class="px-4 py-3">Preferred Property</th>
            <th class="px-4 py-3">Max Rent</th>
            <th class="px-4 py-3">Comments</th>
            <th class="px-4 py-3">Date Registered</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($registrations as $reg)
            <tr class="border-b">

                <td class="px-4 py-3">
                    {{ $reg->registration_id }}
                </td>

                <td class="px-4 py-3">
                    {{ $reg->client->first_name ?? 'No Client' }}
                    {{ $reg->client->last_name ?? '' }}
                </td>

                <td class="px-4 py-3">
                    {{ $reg->client->address ?? 'N/A' }}
                </td>

                <td class="px-4 py-3">
                    {{ $reg->client->phone ?? 'N/A' }}
                </td>

                <td class="px-4 py-3">
                    {{ $reg->preferred_property_type ?? '—' }}
                </td>

                <td class="px-4 py-3">
                    {{ number_format($reg->max_rent ?? 0, 0) }}
                </td>

                <td class="px-4 py-3">
                    {{ $reg->comments ?? '—' }}
                </td>

                <td class="px-4 py-3">
                    {{ $reg->date_registered ?? '—' }}
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center py-4">
                    No registrations found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- PAGINATION -->
<div class="mt-4">
    {{ $registrations->withQueryString()->links() }}
</div>

@endsection