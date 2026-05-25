@extends('layouts.app')

@section('content')

<div class="hero" 
     style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center;
            background-size: cover;
            padding: 80px 20px;
            text-align: center;
            border-radius: 12px;">

    <h1 class="text-4xl font-bold text-white drop-shadow">Welcome Back ✨</h1>
    <p class="mt-2 text-white text-lg drop-shadow">
        Manage your properties, clients, and reports in one place.
    </p>
</div>

<div class="cards mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="card bg-white/10 backdrop-blur-md p-6 rounded-xl text-center text-white border border-white/20">
        <h3 class="text-lg font-semibold">Total Properties</h3>
        <p class="text-2xl mt-2">0</p>
    </div>

    <div class="card bg-white/10 backdrop-blur-md p-6 rounded-xl text-center text-white border border-white/20">
        <h3 class="text-lg font-semibold">Total Clients</h3>
        <p class="text-2xl mt-2">0</p>
    </div>

    <div class="card bg-white/10 backdrop-blur-md p-6 rounded-xl text-center text-white border border-white/20">
        <h3 class="text-lg font-semibold">Available Units</h3>
        <p class="text-2xl mt-2">0</p>
    </div>

</div>

@endsection
