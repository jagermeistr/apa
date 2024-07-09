@extends('agent.agent_dashboard')
@section('agent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate"></script>



<div class="page-content">
    <div class="col-md-8 col-xl-8 center-wrapper">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('agent.users.update') }}" class="forms-sample">
                        @csrf

                        <!-- Hidden fields to store user ID and profile data -->
                        <input type="hidden" name="user_id" id="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="profile_data" id="profile_data" value="{{ json_encode($profileData->toArray()) }}">

                        <!-- Profile update fields -->
                        <div id="profile-update-fields">
                            <div class="mb-3">
                                <label for="farm" class="form-label">Farm Name</label>
                                <input type="text" name="farm" class="form-control" id="farm" value="{{ $profileData->farm }}" autocomplete="off">
                            </div>

                            <div class="mb-3">
                                <label for="weight_collected" class="form-label">Weight Collected</label>
                                <input type="number" name="weight_collected" class="form-control" id="weight_collected" value="{{ $profileData->weight_collected }}" autocomplete="off">
                            </div>

                            <!-- Button to update profile -->
                            <button type="submit" class="btn btn-primary me-2" name="update_profile">Save Changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
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

        $('button[name="Save Changes"]').on('click', function(e) {
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