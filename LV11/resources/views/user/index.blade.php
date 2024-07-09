@extends('user.user_dashboard')
@section('user')
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
    // <!-- Updates the header area with the info from profile -->
    @endphp
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-10 col-xl-10 left-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-2">

                        <div>
                            <img class="wd-80 rounded-circle" src="{{ (!empty($profileData->photo)) ? url('input/admin_images'.$profileData->photo):url('input/no_image.jpg') }}" alt="profile">
                            <span class="h4 ms-3 ">{{ $profileData -> name }}</span>
                        </div>

                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Farm:</label>
                        <p class="text-muted">{{ $profileData -> farm }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                        <p class="text-muted">{{ $profileData -> phone }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">latest Weight:</label>
                        <p class="text-muted">{{ $profileData -> weight_collected }}</p>
                    </div>
                    <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Date:</label>
                        <p class="text-muted">{{ $profileData -> updated_at }}</p>
                    </div>
                    <!-- <div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Total Weight:</label>
                        <p class="text-muted">
                            @php
                            $total_weight = App\Models\PluckerDetails::where('id', Auth::User()->id)
                            ->groupBy('id')
                            ->sum('weight_collected');
                            @endphp
                            {{ $total_weight }} kg
                        </p>
                    </div> -->

                    <!-- <<div class="mt-3">
                        <label class="tx-11 fw-bolder mb-0 text-uppercase">Website:</label>
                        <p class="text-muted">www.nobleui.com</p>
                    </div> -->
                    <!-- <div class="mt-3 d-flex social-links">
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="github"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="twitter"></i>
                        </a>
                        <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                            <i data-feather="instagram"></i>
                    </a>
                </div> -->
                </div>
            </div>
        </div>
        
                    <p>Name: {{ $user->name }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <form action="{{ route('termination.request') }}" method="POST">
                        @csrf
                        <button type="submit">Request Payment</button>
                    </form>
    </div> 


</div>
@endsection