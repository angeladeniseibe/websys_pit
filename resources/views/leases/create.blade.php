@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Create Lease</h1>

<form action="{{ route('leases.store') }}" method="POST" class="space-y-4">
    @csrf

    <input type="text"
           name="tenant_name"
           placeholder="Tenant Name"
           class="w-full border p-2 rounded">

    <input type="text"
           name="property_name"
           placeholder="Property Name"
           class="w-full border p-2 rounded">

    <input type="date"
           name="start_date"
           class="w-full border p-2 rounded">

    <input type="date"
           name="end_date"
           class="w-full border p-2 rounded">

    <select name="status" class="w-full border p-2 rounded">
        <option value="available">Available</option>
        <option value="reserved">Reserved</option>
        <option value="rented">Rented</option>
    </select>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Save Lease
    </button>
</form>

@endsection