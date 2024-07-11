@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<div class="page-content">
    <div class="row profile-body">
        <!-- left wrapper start -->
        <div class="d-none d-md-block col-md-8 col-xl-8 middle-wrapper">
            <div class="card rounded">
                <div class="card-body">
                    <h6 class="card-title"> Edit Farmer</h6>
                    <form id="my Form" method="POST" action="{{route('update.farmer')}}"  class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" class="form-control" value="{{$farmer->id}}">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Farmer Name</label>
                            <input type="text" name="name" class="form-control" value="{{$farmers->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Farm Name</label>
                            <input type="text" name="name" class="form-control" value="{{$farmers->farm}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{$farmers->phone}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Farmer Name</label>
                            <input type="text" name="phone" class="form-control" value="{{$farmers->weight_collected}}">
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