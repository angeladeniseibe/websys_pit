@extends('layouts.app')

@section('content')
   <h1 class="text-2xl font-bold text-center mb-4">
        Client's Records
    </h1>


<a href="{{ route('registrations.index') }}" class="btn secondary mb-4">
    ← Back to Registrations
</a>

<!-- SEARCH -->
<form method="GET" action="{{ route('clients.index') }}" class="mb-4 flex gap-2">
    <input type="text"
           name="search"
           value="{{ $search ?? '' }}"
           placeholder="Search client name or phone..."
           class="border p-2 rounded w-1/3">

    <button class="btn primary">Search</button>

    <a href="{{ route('clients.index') }}" class="btn secondary">Reset</a>
</form>

<table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
    <thead class="bg-gray-800 text-white">
        <tr>
            <th class="px-4 py-3">Client ID</th>
            <th class="px-4 py-3">First Name</th>
            <th class="px-4 py-3">Last Name</th>
            <th class="px-4 py-3">Address</th>
            <th class="px-4 py-3">Phone</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($clients as $client)
            <tr class="border-b">

                <td class="px-4 py-3">
                    {{ $client->client_id }}
                </td>

                <td class="px-4 py-3">
                    {{ $client->first_name }}
                </td>

                <td class="px-4 py-3">
                    {{ $client->last_name }}
                </td>

                <td class="px-4 py-3">
                    {{ $client->address }}
                </td>

                <td class="px-4 py-3">
                    {{ $client->phone }}
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center py-4">
                    No clients found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- PAGINATION -->
<div class="mt-4">
    {{ $clients->withQueryString()->links() }}
</div>

@endsection