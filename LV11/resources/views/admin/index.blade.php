@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <div class="row profile-body">
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
        $userCount=App\Models\User::count()
        @endphp

        <div class="container">
            <div class=" justify-content-left">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Database:users</div>

                        <div class="card-body">
                            <h5>Number of Users: {{ $userCount }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>









    </div>
    <div class="row profile-body">
        <div class="container">
            <div class=" justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Database:Collection Centre</div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection