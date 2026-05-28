@extends('layouts.app')

@section('content')


<div class="max-w-7xl mx-auto px-8 py-12">

    <!-- HEADER -->
    <div class="mb-8">
        <div class="bg-gray-900/80 backdrop-blur-md border border-gray-700
                    rounded-2xl px-8 py-8 shadow-lg text-center">
            <h1 class="text-3xl font-bold text-white">
                Add Inspection
            </h1>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <div class="mb-6">
        <a href="{{ route('inspections.index') }}"
           class="px-5 py-3 bg-gray-200 border-2 border-gray-800 rounded-xl
                  hover:bg-gray-300 font-semibold">
            ← Back to Inspections
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white border-2 border-gray-900 rounded-2xl shadow-lg p-6">

        <form action="{{ route('inspections.store') }}" method="POST">
            @csrf

            <table class="table-auto w-full border-collapse">
                <tbody>

                    <tr>
                        <td class="p-3 font-semibold w-1/4">Client</td>
                        <td class="p-3">
                            <select name="client_name"
                                    class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                    required>
                                <option value="">-- Select Client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->first_name }} {{ $client->last_name }}">
                                        {{ $client->first_name }} {{ $client->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Property Name</td>
                        <td class="p-3">
                            <input type="text"
                                   name="property_name"
                                   placeholder="Enter property name"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                   required>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Viewing Date</td>
                        <td class="p-3">
                            <input type="date"
                                   name="viewing_date"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                   required>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold align-top">Feedback</td>
                        <td class="p-3">
                            <textarea name="feedback"
                                      rows="4"
                                      placeholder="Enter feedback..."
                                      class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"></textarea>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="mt-6">
                <button type="submit"
                        class="w-full px-6 py-3 bg-gray-900 text-white rounded-xl
                               hover:bg-black transition font-semibold text-center block shadow-md">
                    Save Inspection
                </button>
            </div>

        </form>

    </div>

</div>

@endsection