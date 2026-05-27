@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-8 py-12">
<!-- HEADER -->
<div class="mb-8">

    <div class="bg-gray-900/80 backdrop-blur-md border border-gray-700
                rounded-2xl px-8 py-8 shadow-lg text-center">

        <h1 class="text-3xl font-bold text-white">
            Client's Records
        </h1>

    </div>

</div>

    <!-- BACK BUTTON -->
    <div class="mb-6">
        <a href="{{ route('registrations.index') }}"
           class="px-5 py-3 bg-gray-200 border-2 border-gray-800 rounded-xl
                  hover:bg-gray-300 font-semibold">
            ← Back to Registrations
        </a>
    </div>

    <!-- SEARCH -->
    <form method="GET" action="{{ route('clients.index') }}"
          class="flex gap-4 mb-6">

        <input type="text"
               name="search"
               value="{{ $search ?? '' }}"
               placeholder="Search client name or phone..."
               class="w-1/3 px-4 py-3 border-2 border-gray-800 rounded-xl
                      focus:outline-none focus:ring-2 focus:ring-gray-900">

        <button class="px-6 py-3 bg-gray-900 text-white rounded-xl
                       hover:bg-black transition font-semibold">
            Search
        </button>

    </form>

    <!-- TABLE CARD -->
    <div class="bg-white border-2 border-gray-900 rounded-2xl shadow-lg overflow-hidden">

        <table class="min-w-full text-sm">

            <thead class="bg-gray-100 border-b-2 border-gray-900">
                <tr>
                    <th class="px-6 py-5 text-left font-bold">Client ID</th>
                    <th class="px-6 py-5 text-left font-bold">First Name</th>
                    <th class="px-6 py-5 text-left font-bold">Last Name</th>
                    <th class="px-6 py-5 text-left font-bold">Address</th>
                    <th class="px-6 py-5 text-left font-bold">Phone</th>
                </tr>
            </thead>

            <tbody class="divide-y-2 divide-gray-900">

                @forelse ($clients as $client)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-6 py-5 font-semibold text-gray-900">
                            {{ $client->client_id }}
                        </td>

                        <td class="px-6 py-5 text-gray-800 font-medium">
                            {{ $client->first_name }}
                        </td>

                        <td class="px-6 py-5 text-gray-800 font-medium">
                            {{ $client->last_name }}
                        </td>

                        <td class="px-6 py-5 text-gray-700">
                            {{ $client->address }}
                        </td>

                        <td class="px-6 py-5 text-gray-700">
                            {{ $client->phone }}
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-10 text-gray-600 font-medium">
                            No clients found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>
   <!-- PAGINATION -->
<div class="mt-6 flex justify-center">
    <div class="bg-white border-2 border-gray-900 rounded-xl px-6 py-3 shadow-md">
        {{ $clients->withQueryString()->links() }}
    </div>
</div>

</div>
</div>

@endsection
