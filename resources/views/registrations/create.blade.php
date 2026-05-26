@extends('layouts.app')

@section('content')

<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">

<div class="max-w-7xl mx-auto px-8 py-12">

    <div class="relative mb-8">
        <div class="bg-gray-900/80 backdrop-blur-md border border-gray-700 rounded-2xl px-6 py-5 shadow-lg flex items-center">

            <div class="flex-1">
                <a href="{{ route('registrations.index') }}"
                   class="inline-flex items-center gap-2 px-5 py-2 bg-white text-gray-900
                          font-semibold rounded-xl hover:bg-gray-200 transition shadow-sm">
                    ← Back
                </a>
            </div>

            <div class="flex-1 text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-white tracking-wide drop-shadow">
                    Create Registration
                </h2>
                <p class="text-gray-300 text-sm mt-1">
                    Fill in the details to create a new client registration
                </p>
            </div>

            <div class="flex-1"></div>

        </div>
    </div>

    <div class="bg-white border-2 border-gray-900 rounded-2xl shadow-lg p-6">

        <form action="{{ route('registrations.store') }}" method="POST">
            @csrf

            <table class="table-auto w-full border-collapse">
                <tbody>

                    <tr>
                        <td class="p-3 font-semibold w-1/4">Client</td>
                        <td class="p-3">
                            <select name="client_id" class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3" required>
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
                        <td class="p-3 font-semibold">Branch</td>
                        <td class="p-3">
                            <select name="branch_no" id="branch_no"
                                    class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                    required>
                                <option value="">-- Select Branch --</option>
                                @foreach($branches as $branch)
                                    <option value="{{ $branch->branch_no }}">
                                        {{ $branch->branch_no }} — {{ $branch->city }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Staff</td>
                        <td class="p-3">
                            <select name="staff_id" id="staff_id"
                                    class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                    required>
                                <option value="">-- Select Branch First --</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Date Registered</td>
                        <td class="p-3">
                            <input type="date" name="date_registered"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"
                                   required>
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Preferred Property Type</td>
                        <td class="p-3">
                            <input type="text" name="preferred_property_type"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3">
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold">Max Rent</td>
                        <td class="p-3">
                            <input type="number" name="max_rent"
                                   class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3">
                        </td>
                    </tr>

                    <tr>
                        <td class="p-3 font-semibold align-top">Comments</td>
                        <td class="p-3">
                            <textarea name="comments" rows="3"
                                      class="form-control w-full border-2 border-gray-800 rounded-xl px-4 py-3"></textarea>
                        </td>
                    </tr>

                </tbody>
            </table>

            <div class="mt-6">
                <button type="submit"
                        class="w-full px-6 py-3 bg-gray-900 text-white rounded-xl
                               hover:bg-black transition font-semibold text-center block shadow-md">
                    Save Registration
                </button>
            </div>

        </form>

    </div>

</div>

{{-- JS: LOAD STAFF BASED ON BRANCH --}}
<script>
document.getElementById('branch_no').addEventListener('change', function () {

    let branchNo = this.value;
    let staffSelect = document.getElementById('staff_id');

    staffSelect.innerHTML = '<option value="">Loading staff...</option>';

    if (!branchNo) {
        staffSelect.innerHTML = '<option value="">-- Select Branch First --</option>';
        return;
    }

    fetch(`/get-staff/${branchNo}`)
        .then(res => res.json())
        .then(data => {
            let options = '<option value="">-- Select Staff --</option>';
            data.forEach(staff => {
                options += `
                    <option value="${staff.staff_id}">
                        ${staff.first_name} ${staff.last_name} (${staff.position})
                    </option>
                `;
            });
            staffSelect.innerHTML = options;
        })
        .catch(() => {
            staffSelect.innerHTML = '<option value="">Error loading staff</option>';
        });
});
</script>

</body>
@endsection