@extends('layouts.app')

@section('content')
<!-- WARM BACKGROUND WRAPPER -->

<div class="min-h-screen bg-gradient-to-br from-orange-500 via-amber-400 to-yellow-500">

<div class="max-w-7xl mx-auto px-6">

<!-- HEADER -->
<div class="mb-6">

    <h1 class="text-2xl font-bold text-center mb-4 text-gray-800">
        Client Registration List
    </h1>

</div>

<!-- SEARCH BAR -->
<form method="GET" action="{{ route('registrations.index') }}" class="mb-4 flex gap-2">

    <input type="text"
           name="search"
           value="{{ $search ?? '' }}"
           placeholder="Search client name or phone..."
           class="border border-amber-200 bg-white/80 backdrop-blur px-3 py-2 rounded w-1/3 focus:outline-none focus:ring-2 focus:ring-amber-300">

    <button class="btn primary">
        Search
    </button>

    <a href="{{ route('registrations.index') }}" class="btn secondary">
        Reset
    </a>

</form>

<!-- BUTTON ROW -->
<div class="flex items-center justify-between mb-4">

    <a href="{{ route('registrations.create') }}" class="btn primary">
        + Add New Registration
    </a>

    <a href="{{ route('clients.index') }}" class="btn primary">
        View Clients
    </a>

</div>

<!-- TABLE -->
<div class="bg-white/90 backdrop-blur rounded-lg shadow-md overflow-hidden">

<table class="min-w-full">

    <thead class="bg-amber-100 text-gray-700">
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

    <tbody class="divide-y divide-amber-100">

        @forelse ($registrations as $reg)
            <tr class="hover:bg-amber-50 transition">

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
                <td colspan="8" class="text-center py-6 text-gray-500">
                    No registrations found.
                </td>
            </tr>
        @endforelse

    </tbody>

</table>

</div>

<!-- PAGINATION -->
<div class="mt-4">
    {{ $registrations->withQueryString()->links() }}
</div>

</div>
</div>

@endsection