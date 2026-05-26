@extends('layouts.app')

@section('content')

<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">

<div class="min-h-screen flex items-center justify-center px-4">


    <div class="page-header">
        <h1>Add Inspection</h1>
    </div>

    <form action="{{ route('inspections.store') }}" method="POST" class="space-y-4">
        @csrf

        <input type="text"
               name="client_name"
               placeholder="Client Name"
               class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">

        <input type="text"
               name="property_name"
               placeholder="Property Name"
               class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none">

        <!-- VIEWING DATE -->
        <div class="space-y-1">
            <label class="text-white text-sm font-medium">Viewing Date</label>
            <input type="date"
                   name="viewing_date"
                   class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white focus:outline-none">
        </div>

        <textarea name="feedback"
                  placeholder="Feedback"
                  rows="4"
                  class="w-full p-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none"></textarea>

        <button type="submit" class="btn-glass">
            <span>➕</span> Save Inspection
        </button>

    </form>

</div>

</div>

@endsection