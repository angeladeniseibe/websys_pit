@extends('layouts.app')

@section('content')

<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">

<div class="table-section">

    <div class="page-header">
        <h1>Create Lease</h1>
    </div>

    <form action="{{ route('leases.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- CLIENT NAME -->
        <input type="text"
               name="tenant_name"
               placeholder="Client Name"
               class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">

        <select name="property_id" class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">
            <option value="" disabled selected>Select Property</option>
            @foreach($properties as $property)
                <option value="{{$property->property_id}}">{{$property->property_id}}</option>
            @endforeach
        </select>

        <!-- RENT -->
        <input type="number"
               name="rent"
               placeholder="Rent"
               class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">

        <!-- DEPOSIT -->
        <input type="number"
               name="deposit"
               placeholder="Deposit"
               class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">

        <!-- PAYMENT METHOD -->
        <select name="payment_method"
                class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none">

            <option value="" class="text-black">Select Payment Method</option>
            <option value="Cash" class="text-black">Cash</option>
            <option value="Bank Transfer" class="text-black">Bank Transfer</option>

        </select>

        <!-- START DATE -->
        <div class="space-y-1">
            <label class="text-white text-sm font-medium">Start Date</label>

            <input type="date"
                   name="start_date"
                   class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none">
        </div>

        <!-- END DATE -->
        <div class="space-y-1">
            <label class="text-white text-sm font-medium">End Date</label>

            <input type="date"
                   name="end_date"
                   class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none">
        </div>

        <!-- BUTTON -->
        <button type="submit" class="btn-glass">
            <span>➕</span> Save Lease
        </button>

    </form>

</div>

@endsection
