@extends('layouts.app')

@section('content')
<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">

<div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h2 class="text-xl font-bold mb-6 text-gray-800">My Profile</h2>

    @if($client)

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg overflow-hidden">

                <tbody class="divide-y divide-gray-200">

                    <tr class="bg-gray-50">
                        <td class="px-4 py-3 font-semibold text-gray-600 w-1/3">Full Name</td>
                        <td class="px-4 py-3 text-gray-800">
                            {{ $client->first_name }} {{ $client->last_name }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3 font-semibold text-gray-600">Address</td>
                        <td class="px-4 py-3 text-gray-800">
                            {{ $client->address }}
                        </td>
                    </tr>

                    <tr class="bg-gray-50">
                        <td class="px-4 py-3 font-semibold text-gray-600">Phone</td>
                        <td class="px-4 py-3 text-gray-800">
                            {{ $client->phone }}
                        </td>
                    </tr>

                    <tr>
                        <td class="px-4 py-3 font-semibold text-gray-600">Email</td>
                        <td class="px-4 py-3 text-gray-800">
                            {{ $client->email }}
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>

    @else

        <div class="p-4 bg-yellow-100 text-yellow-800 rounded">
            No client record linked to your account.
        </div>

    @endif

</div>
@endsection