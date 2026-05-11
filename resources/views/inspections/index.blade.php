@extends('layouts.app')

@section('content')
<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">

<div class="main-content">

    <div class="hero">
        <div class="page-header">
            <h1>Property Inspections</h1>

                        <a href="{{ route('inspections.create') }}" class="btn">
                <span>＋</span> Add Inspection
            </a>
        </div>
    </div>

    <div class="table-section">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Client</th>
                    <th>Property</th>
                    <th>Date</th>
                    <th>Feedback</th>
                </tr>
            </thead>

            <tbody>
                @foreach($inspections as $viewing)
                <tr>
                    <td>{{ $viewing->client_name }}</td>
                    <td>{{ $viewing->property_name }}</td>
                    <td>{{ $viewing->viewing_date }}</td>
                    <td>{{ $viewing->feedback }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection