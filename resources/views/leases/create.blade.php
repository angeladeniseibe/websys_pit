@extends('layouts.app')

@section('content')

<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="table-section w-full max-w-2xl text-center">

        <!-- HEADER -->
        <div class="page-header mb-6">
            <h1 class="text-3xl font-bold text-white">Create Lease</h1>
        </div>

        <form action="{{ route('leases.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- CLIENT NAME -->
            <div>
                <input type="text"
                       name="tenant_name"
                       placeholder="Client Name"
                       class="w-full p-3 rounded-lg text-center bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">
            </div>

            <!-- PROPERTY ID -->
            <div>
                <input type="text"
                       id="property_id"
                       name="property_id"
                       placeholder="Enter Property ID"
                       class="w-full p-3 rounded-lg text-center bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">

                <!-- PROPERTY STATUS -->
                <p id="property-status"
                   class="mt-2 text-sm font-semibold text-white">
                </p>
            </div>

            <!-- RENT -->
            <div>
                <input type="number"
                       name="rent"
                       placeholder="Rent"
                       class="w-full p-3 rounded-lg text-center bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">
            </div>

            <!-- DEPOSIT -->
            <div>
                <input type="number"
                       name="deposit"
                       placeholder="Deposit"
                       class="w-full p-3 rounded-lg text-center bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">
            </div>

            <!-- PAYMENT METHOD -->
            <div>
                <select name="payment_method"
                        class="w-full p-3 rounded-lg text-center bg-white/10 border border-white/20 text-white focus:outline-none">

                    <option value="" class="text-black">Select Payment Method</option>
                    <option value="Cash" class="text-black">Cash</option>
                    <option value="Bank Transfer" class="text-black">Bank Transfer</option>

                </select>
            </div>

            <!-- START DATE -->
            <div>
                <label class="block text-white text-sm font-medium mb-1">
                    Start Date
                </label>

                <input type="date"
                       name="start_date"
                       class="w-full p-3 rounded-lg text-center bg-white/10 border border-white/20 text-white focus:outline-none">
            </div>

            <!-- END DATE -->
            <div>
                <label class="block text-white text-sm font-medium mb-1">
                    End Date
                </label>

                <input type="date"
                       name="end_date"
                       class="w-full p-3 rounded-lg text-center bg-white/10 border border-white/20 text-white focus:outline-none">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-center">
                <button type="submit" class="btn-glass px-6 py-3">
                    <span>➕</span> Save Lease
                </button>
            </div>

        </form>

    </div>

</div>

<!-- AJAX PROPERTY STATUS CHECK -->
<script>
document.getElementById('property_id').addEventListener('keyup', function () {

    let propertyId = this.value;

    fetch(`/check-property/${propertyId}`)
        .then(response => response.json())
        .then(data => {

            let statusText = '';
            let statusColor = '';

            if (data.status === 'available') {
                statusText = '✅ Property Available';
                statusColor = 'lightgreen';

            } else if (data.status === 'reserved') {
                statusText = '🟡 Property Reserved';
                statusColor = 'yellow';

            } else {
                statusText = '❌ Property Not Available';
                statusColor = 'red';
            }

            const statusElement = document.getElementById('property-status');

            statusElement.innerText = statusText;
            statusElement.style.color = statusColor;
        });
});
</script>

@endsection