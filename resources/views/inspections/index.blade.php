@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-8 py-12">

    <!-- HEADER -->
    <div class="mb-8">
        <div class="bg-gray-900/80 backdrop-blur-md border border-gray-700
                    rounded-2xl px-8 py-8 shadow-lg text-center">
            <h1 class="text-3xl font-bold text-white">
                Property Inspections
            </h1>
        </div>
    </div>

    <!-- ADD BUTTON -->
    <div class="mb-6">
        <a href="{{ route('inspections.create') }}"
           class="px-5 py-3 bg-gray-900 text-white border-2 border-gray-800 rounded-xl
                  hover:bg-black transition font-semibold">
            ＋ Add Inspection
        </a>
    </div>

    <!-- SEARCH -->
    <form method="GET" action="{{ route('inspections.index') }}"
          class="flex gap-4 mb-6">

        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Search client name or property..."
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
                    <th class="px-6 py-5 text-left font-bold">Client</th>
                    <th class="px-6 py-5 text-left font-bold">Property</th>
                    <th class="px-6 py-5 text-left font-bold">Viewing Date</th>
                    <th class="px-6 py-5 text-left font-bold">Feedback</th>
                </tr>
            </thead>

            <tbody class="divide-y-2 divide-gray-900">

                @forelse($inspections as $viewing)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-5 font-semibold text-gray-900">{{ $viewing->client_name }}</td>
                        <td class="px-6 py-5 text-gray-800 font-medium">{{ $viewing->property_name }}</td>
                        <td class="px-6 py-5 text-gray-700">{{ $viewing->viewing_date }}</td>
                        <td class="px-6 py-5 text-gray-700">{{ $viewing->feedback }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-10 text-gray-600 font-medium">
                            No inspection records found.
                        </td>
                    </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection