@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-8 col-xl-8 middle-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <h6 class="card-title"> Edit Roles</h6>
                    <form id="my Form" method="POST" action="{{route('update.roles')}}"  class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" class="form-control" value="{{$roles->id}}">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Role Name</label>
                            <input type="text" name="name" class="form-control @error('name') is invalid @enderror" value="{{$roles->name}}">
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                            <button type="Submit" class="btn btn-primary me-2">Save Changes</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection