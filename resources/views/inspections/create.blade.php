@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Add Inspection</h1>

<form action="{{ route('inspections.store') }}" method="POST" class="space-y-4">
    @csrf

    <input type="text"
           name="client_name"
           placeholder="Client Name"
           class="w-full border p-2 rounded">

    <input type="text"
           name="property_name"
           placeholder="Property Name"
           class="w-full border p-2 rounded">

    <input type="date"
           name="viewing_date"
           class="w-full border p-2 rounded">

    <textarea name="feedback"
              placeholder="Feedback"
              class="w-full border p-2 rounded"></textarea>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Save Inspection
    </button>
</form>

@endsection