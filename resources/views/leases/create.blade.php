@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-8 py-12">

    <!-- HEADER -->
    <div class="mb-8">
        <div class="bg-gray-900/80 backdrop-blur-md border border-gray-700
                    rounded-2xl px-8 py-8 shadow-lg text-center">
            <h1 class="text-3xl font-bold text-white">
                Create Lease
            </h1>
        </div>
    </div>

    <!-- BACK BUTTON -->
    <div class="mb-6">
        <a href="{{ route('leases.index') }}"
           class="px-5 py-3 bg-gray-200 border-2 border-gray-800 rounded-xl
                  hover:bg-gray-300 font-semibold">
            ← Back to Leases
        </a>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white border-2 border-gray-900 rounded-2xl shadow-lg p-6">

        <form action="{{ route('leases.store') }}" method="POST">
            @csrf

            <table class="table-auto w-full border-collapse">
                <tbody>

                    <tr>
                        <td class="p-3 font-semibold w-1/4">Client</td>
                        <td class="p-3">
                            <select name="client_id"
                                    class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                    required>
                                <option value="">-- Select Client --</option>
                                @foreach($clients as $client)
                                    <option value="{{ $client->client_id }}">
                                        {{ $client->first_name }} {{ $client->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Property</td>
                        <td class="p-3">
                            <select name="property_id"
                                    id="property_select"
                                    class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                    required>
                                <option value="">-- Select Property --</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->property_id }}">
                                        {{ $property->property_id }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Rent</td>
                        <td class="p-3">
                            <input type="number"
                                   name="rent"
                                   id="rent_field"
                                   placeholder="Auto-fills on property select"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                   required>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Deposit</td>
                        <td class="p-3">
                            <input type="number"
                                   name="deposit"
                                   placeholder="Deposit"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                   required>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Payment Method</td>
                        <td class="p-3">
                            <select name="payment_method"
                                    class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                    required>
                                <option value="">-- Select Payment Method --</option>
                                <option value="Cash">Cash</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Start Date</td>
                        <td class="p-3">
                            <input type="date"
                                   name="start_date"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                   required>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">End Date</td>
                        <td class="p-3">
                            <input type="date"
                                   name="end_date"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                   required>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="mt-6">
                <button type="submit"
                        class="w-full px-6 py-3 bg-gray-900 text-white rounded-xl
                               hover:bg-black transition font-semibold text-center block shadow-md">
                    Save Lease
                </button>
            </div>

        </form>

    </div>

</div>

<script>
document.getElementById('property_select').addEventListener('change', function () {
    const propertyId = this.value;
    const rentField  = document.getElementById('rent_field');

    if (!propertyId) return;

    rentField.placeholder = 'Loading...';

    fetch(`/get-property/${propertyId}`)
        .then(res => res.json())
        .then(data => {
            if (data.rent !== undefined) {
                rentField.value = data.rent;
            } else {
                rentField.placeholder = 'Rent not found';
            }
        })
        .catch(() => {
            rentField.placeholder = 'Error loading rent';
        });
});
</script>

@endsection