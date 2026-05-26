@extends('layouts.app')

@section('content')
<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">

<div class="max-w-7xl mx-auto px-8 py-12">

    <div class="mb-10">
        <div class="bg-gray-900/80 backdrop-blur-md border border-gray-700
                    rounded-2xl px-8 py-8 shadow-lg text-center">

            <h1 class="text-4xl font-extrabold text-white tracking-wide drop-shadow">
                Client Registration List
            </h1>

            <p class="text-gray-300 mt-2 text-sm md:text-base">
                Manage and track all client registrations in one place
            </p>

        </div>
    </div>

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5 mb-8">

        <form method="GET" action="{{ route('registrations.index') }}"
              class="flex w-full md:w-1/2 gap-4">

            <input type="text"
                   name="search"
                   value="{{ $search ?? '' }}"
                   placeholder="Search client name or phone..."
                   class="w-full px-5 py-3 border-2 border-gray-800 rounded-xl
                          bg-white text-gray-900
                          focus:outline-none focus:ring-2 focus:ring-gray-900">

            <button class="px-6 py-3 bg-gray-900 text-white rounded-xl
                           hover:bg-black transition font-semibold">
                Search
            </button>
        </form>

        <div class="flex gap-4">

            <a href="{{ route('staff.dashboard') }}"
               class="px-5 py-3 bg-gray-700 text-white rounded-xl
                      hover:bg-gray-800 transition font-semibold shadow-md">
                ← Back to Dashboard
            </a>

            <a href="{{ route('registrations.create') }}"
               class="px-5 py-3 bg-blue-600 text-white rounded-xl
                      hover:bg-blue-700 transition font-semibold shadow-md">
                + Add Registration
            </a>

            <a href="{{ route('clients.index') }}"
               class="px-5 py-3 bg-green-600 text-white rounded-xl
                      hover:bg-green-700 transition font-semibold shadow-md">
                View Clients
            </a>

        </div>

    </div>

    <div class="bg-white border-2 border-gray-900 rounded-2xl shadow-lg overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full text-sm">

                <thead class="bg-gray-100 text-gray-900 border-b-2 border-gray-900">
                    <tr>
                        <th class="px-6 py-5 text-left font-bold">ID</th>
                        <th class="px-6 py-5 text-left font-bold">Client</th>
                        <th class="px-6 py-5 text-left font-bold">Address</th>
                        <th class="px-6 py-5 text-left font-bold">Phone</th>
                        <th class="px-6 py-5 text-left font-bold">Preferred Property</th>
                        <th class="px-6 py-5 text-left font-bold">Max Rent</th>
                        <th class="px-6 py-5 text-left font-bold">Comments</th>
                        <th class="px-6 py-5 text-left font-bold">Date</th>
                        <th class="px-6 py-5 text-left font-bold">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y-2 divide-gray-900">

                @forelse ($registrations as $reg)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-5 font-semibold text-gray-900">
                            {{ $reg->registration_id }}
                        </td>

                        <td class="px-6 py-5 font-semibold text-gray-900">
                            {{ $reg->client->first_name ?? 'No Client' }}
                            {{ $reg->client->last_name ?? '' }}
                        </td>

                        <td class="px-6 py-5 text-gray-700">
                            {{ $reg->client->address ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-5 text-gray-700">
                            {{ $reg->client->phone ?? 'N/A' }}
                        </td>

                        <td class="px-6 py-5 text-gray-700 font-medium">
                            {{ $reg->preferred_property_type ?? '—' }}
                        </td>

                        <td class="px-6 py-5 font-medium text-gray-900">
                            ₱{{ number_format($reg->max_rent ?? 0, 0) }}
                        </td>

                        <td class="px-6 py-5 text-gray-700">
                            {{ $reg->comments ?? '—' }}
                        </td>

                        <td class="px-6 py-5 text-gray-600">
                            {{ $reg->date_registered ?? '—' }}
                        </td>

                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <a href="{{ route('registrations.edit', $reg->registration_id) }}"
                                   class="inline-block px-4 py-2 bg-gray-900 text-white rounded-lg
                                          hover:bg-black font-semibold text-center shadow-sm">
                                    Edit
                                </a>

                                {{-- Fallback visibility verification check --}}
                                @if(auth()->user() && (strtolower(auth()->user()->role) === 'admin' || auth()->user()->is_admin))
                                    <form action="{{ route('registrations.destroy', $reg->registration_id) }}"
                                          method="POST"
                                          class="inline-block"
                                          onsubmit="return confirm('Delete this registration?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 bg-red-700 text-white rounded-lg
                                                       hover:bg-red-800 font-semibold shadow-sm">
                                            Delete
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>

                    </tr>

                @empty
                    <tr>
                        <td colspan="9" class="text-center py-12 text-gray-600 font-medium">
                            No registrations found.
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>
    </div>

    <div class="mt-6 flex justify-center">
        <div class="bg-white border-2 border-gray-900 rounded-xl px-6 py-3 shadow-md">
            {{ $registrations->withQueryString()->links() }}
        </div>
    </div>

</div>

</body>
@endsection