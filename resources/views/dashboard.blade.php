@extends('layouts.app')

@section('content')
<body style="background-color: #f3f4f6;">
<div class="min-h-screen bg-gray-50">

<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- HERO (KEPT + IMPROVED READABILITY) -->
    <div class="relative rounded-2xl overflow-hidden shadow-lg">

        <!-- DARK OVERLAY FOR BETTER TEXT CONTRAST -->
        <div class="absolute inset-0 bg-black/50"></div>

        <!-- BACKGROUND IMAGE -->
        <div class="h-72 w-full"
             style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center;
                    background-size: cover;">
        </div>

        <!-- TEXT CONTENT -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">

            <h1 class="text-4xl font-bold text-white drop-shadow">
                Welcome Back
            </h1>

            <p class="mt-3 text-gray-200 text-lg max-w-2xl">
                Manage your properties, clients, and reports in one place.
            </p>

        </div>

    </div>

</div>

</div>

@endsection
