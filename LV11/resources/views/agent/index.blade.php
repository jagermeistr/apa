@extends('agent.agent_dashboard')
@section('agent')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
        </div>
    </div>
    @php
    $id = Auth::User()->id;
    $profileData= App\Models\User::find($id);
    $user=App\Models\User::find($id);
    @endphp

    <div class="col-md-8 col-xl-8 center-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Update </h6>

                    <form method="GET" action="{{ route('agent.users.search') }}" class="forms-sample">
                        @csrf
                        <!-- National ID input field -->
                        <div class="mb-3">
                            <label for="national_id" class="form-label">Enter National ID:</label>
                            <input type="text" name="national_id" class="form-control" id="national_id" autocomplete="off">
                        </div>
                        <!-- Button to search for user -->
                        <button type="submit" class="btn btn-primary me-2" name="search_user">Search User</button>

                    </form>
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <form action="{{ route('termination.request') }}" method="POST">
                        @csrf
                        <button type="submit">Request Payment</button>
                    </form>




                </div>
            </div>
        </div>
    </div>

    <!-- User profile page with a "Request Termination" button -->
    <div>
        <!-- <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <form action="{{ route('termination.request') }}" method="POST">
        @csrf
        <button type="submit">Request Termination</button> -->
        </form>
    </div>
</div>
<!-- JavaScript code to handle search and update functionality -->
<!-- JavaScript code to handle search and update functionality -->
<script>
    $(document).ready(function() {
        $('button[name="search_user"]').on('click', function(e) {
            e.preventDefault();
            var nationalId = $('#national_id').val();
            $.ajax({
                type: 'GET',
                url: "{{ route('agent.users.search') }}",
                data: {
                    national_id: nationalId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.user_found) {
                        $('#user_id').val(response.user_id);
                        $('#profile_data').val(response.profile_data);
                        $('#profile-update-fields').show();
                    } else {
                        alert('User not found!');
                    }
                }
            });
        });

        $('button[name="update_profile"]').on('click', function(e) {
            e.preventDefault();
            var userId = $('#user_id').val();
            var formData = new FormData();
            formData.append('user_id', userId);
            formData.append('farm', $('#farm').val());
            formData.append('weight_collected', $('#weight_collected').val());
            formData.append('_token', '{{ csrf_token() }}'); // don't forget the CSRF token!

            $.ajax({
                type: 'POST',
                url: "{{ route('agent.users.update') }}",
                data: {
                    user_id: userId,
                    farm_name: $('#farm').val(),
                    weight_collected: $('#weight_collected').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.message) {
                        alert(response.message);
                    }
                }
            });
        });
    });
</script>


@endsection