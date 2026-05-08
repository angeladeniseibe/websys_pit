@extends('layouts.app')

@section('content')
<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">
<div class="hero">
    <h1>Welcome Back ✨</h1>
    <p>Manage your properties, clients, and reports in one place.</p>
</div>

<div class="cards">

    <div class="card">
        <h3>Total Properties</h3>
        <p>0</p>
    </div>

    <div class="card">
        <h3>Total Clients</h3>
        <p>0</p>
    </div>

    <div class="card">
        <h3>Available Units</h3>
        <p>0</p>
    </div>

</div>



@endsection