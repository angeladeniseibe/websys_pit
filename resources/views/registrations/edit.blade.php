@extends('layouts.app')

@section('content')
<body style="background: url('{{ asset('images/bg_photo.jpeg') }}') no-repeat center center fixed; background-size: cover;">
<div class="min-h-screen bg-white text-gray-900">

<div class="max-w-5xl mx-auto px-8 py-12">

    <!-- HEADER -->
    <div class="mb-10 flex items-center justify-between">

        <a href="{{ route('registrations.index') }}"
           class="px-5 py-3 bg-gray-200 border-2 border-gray-800 rounded-xl
                  hover:bg-gray-300 font-semibold">
            ← Back
        </a>

        <h2 class="text-3xl font-bold text-gray-900">
            Edit Registration
        </h2>

        <div></div>
    </div>

    <!-- FORM CARD -->
    <div class="bg-white border-2 border-gray-900 rounded-2xl shadow-lg p-8">

        <form action="{{ route('registrations.update', $registration->registration_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">

                <!-- CLIENT -->
                <div>
                    <label class="block font-semibold mb-2">Client</label>
                    <select name="client_id"
                            class="w-full px-4 py-3 border-2 border-gray-800 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-gray-900"
                            required>
                        @foreach($clients as $client)
                            <option value="{{ $client->client_id }}"
                                {{ $registration->client_id == $client->client_id ? 'selected' : '' }}>
                                {{ $client->first_name }} {{ $client->last_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- BRANCH -->
                <div>
                    <label class="block font-semibold mb-2">Branch</label>
                    <select name="branch_no" id="branch_no"
                            class="w-full px-4 py-3 border-2 border-gray-800 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-gray-900"
                            required>
                        <option value="">-- Select Branch --</option>

                        @foreach($branches as $branch)
                            <option value="{{ $branch->branch_no }}"
                                {{ $registration->branch_no == $branch->branch_no ? 'selected' : '' }}>
                                {{ $branch->branch_no }} — {{ $branch->city }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- STAFF -->
                <div>
                    <label class="block font-semibold mb-2">Staff</label>
                    <select name="staff_id" id="staff_id"
                            class="w-full px-4 py-3 border-2 border-gray-800 rounded-xl
                                   focus:outline-none focus:ring-2 focus:ring-gray-900"
                            required>
                        <option value="">-- Select Staff --</option>

                        @foreach($staff as $s)
                            <option value="{{ $s->staff_id }}"
                                {{ $registration->staff_id == $s->staff_id ? 'selected' : '' }}>
                                {{ $s->first_name }} {{ $s->last_name }} ({{ $s->position }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- DATE -->
                <div>
                    <label class="block font-semibold mb-2">Date Registered</label>
                    <input type="date" name="date_registered"
                           value="{{ $registration->date_registered }}"
                           class="w-full px-4 py-3 border-2 border-gray-800 rounded-xl
                                  focus:outline-none focus:ring-2 focus:ring-gray-900"
                           required>
                </div>

                <!-- PROPERTY -->
                <div>
                    <label class="block font-semibold mb-2">Preferred Property Type</label>
                    <input type="text" name="preferred_property_type"
                           value="{{ $registration->preferred_property_type }}"
                           class="w-full px-4 py-3 border-2 border-gray-800 rounded-xl
                                  focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <!-- MAX RENT -->
                <div>
                    <label class="block font-semibold mb-2">Max Rent</label>
                    <input type="number" name="max_rent"
                           value="{{ $registration->max_rent }}"
                           class="w-full px-4 py-3 border-2 border-gray-800 rounded-xl
                                  focus:outline-none focus:ring-2 focus:ring-gray-900">
                </div>

                <!-- COMMENTS -->
                <div>
                    <label class="block font-semibold mb-2">Comments</label>
                    <textarea name="comments" rows="4"
                              class="w-full px-4 py-3 border-2 border-gray-800 rounded-xl
                                     focus:outline-none focus:ring-2 focus:ring-gray-900">{{ $registration->comments }}</textarea>
                </div>

                <!-- BUTTON -->
                <div class="pt-4">
                    <button type="submit"
                            class="px-6 py-3 bg-gray-900 text-white rounded-xl
                                   hover:bg-black transition font-semibold w-full">
                        Update Registration
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>
</div>

{{-- JS: reload staff when branch changes --}}
<script>
document.getElementById('branch_no').addEventListener('change', function () {

    let branchNo = this.value;
    let staffSelect = document.getElementById('staff_id');

    staffSelect.innerHTML = '<option value="">Loading staff...</option>';

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

@endsection