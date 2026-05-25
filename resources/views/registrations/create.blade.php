@extends('layouts.app')

@section('content')

<div class="page-header" style="display: flex; align-items: center; position: relative;">

    <!-- LEFT: BACK BUTTON -->
    <div style="flex: 1;">
        <a href="{{ route('registrations.index') }}" 
           class="btn secondary" 
           style="padding: 8px 14px; background: #e5e7eb; border-radius: 6px;">
            ← Back
        </a>
    </div>

    <!-- CENTER: TITLE -->
    <div style="flex: 1; text-align: center;">
        <h2 style="margin: 0;">Create Registration</h2>
    </div>

    <!-- RIGHT: EMPTY -->
    <div style="flex: 1;"></div>

</div>

<div class="card" style="padding: 20px;">
    <form action="{{ route('registrations.store') }}" method="POST">
        @csrf

        <table class="table-auto w-full border-collapse">
            <tbody>

                <!-- CLIENT DROPDOWN (FIXED) -->
                <tr>
                    <td class="p-2 font-semibold w-1/4">Client</td>
                    <td class="p-2">
                        <select name="client_id" class="form-control w-full" required>
                            <option value="">-- Select Client --</option>

                            @foreach($clients as $client)
                                <option value="{{ $client->client_id }}">
                                    {{ $client->first_name }} {{ $client->last_name }}
                                </option>
                            @endforeach

                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">Staff ID</td>
                    <td class="p-2">
                        <input type="text" name="staff_id" class="form-control w-full" required>
                    </td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">Branch No.</td>
                    <td class="p-2">
                        <input type="text" name="branch_no" class="form-control w-full">
                    </td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">Date Registered</td>
                    <td class="p-2">
                        <input type="date" name="date_registered" class="form-control w-full" required>
                    </td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">Preferred Property Type</td>
                    <td class="p-2">
                        <input type="text" name="preferred_property_type" class="form-control w-full">
                    </td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold">Max Rent</td>
                    <td class="p-2">
                        <input type="number" name="max_rent" class="form-control w-full">
                    </td>
                </tr>

                <tr>
                    <td class="p-2 font-semibold align-top">Comments</td>
                    <td class="p-2">
                        <textarea name="comments" class="form-control w-full" rows="3"></textarea>
                    </td>
                </tr>

            </tbody>
        </table>

        <div class="mt-4">
            <button type="submit" class="btn primary">Save Registration</button>
        </div>

    </form>
</div>

@endsection