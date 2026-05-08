@extends('layouts.app')

@section('content')
<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">


<div class="main-content">

    <div class="hero">
        <div class="page-header">
            <h1>Lease Agreements</h1>

            <a href="{{ route('leases.create') }}" class="btn-glass">
                <span>＋</span> Add Lease
            </a>
        </div>
    </div>

    <div class="table-section">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Tenant</th>
                    <th>Property</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($leases as $lease)
                <tr>
                    <td>{{ $lease->tenant_name }}</td>
                    <td>{{ $lease->property_name }}</td>
                    <td>{{ $lease->start_date }}</td>
                    <td>{{ $lease->end_date }}</td>
                    <td>{{ $lease->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection